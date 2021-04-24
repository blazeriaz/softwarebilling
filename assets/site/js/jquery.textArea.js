/*
 * Author - Hariharan
 * Version - 0.0.1
 * Release - 23th November 2017
 * Copyright (c) GNU(Free License)
 */

(function ($) {

    $.fn.textareaCounter = function (options) {
        return this.each(function () {
            showTextArea($(this), options);
        });
    };

    /*Definition of private function showTextArea.*/
    function showTextArea($this, options) {
        var opts = $.extend({}, $.fn.textareaCounter.defaults, options);
        var $this = $this;

        var txtElem = "";
        var charElem = "";
        var lineElem = "";
        var progElem = "";
        var progPerc = "";
        var txtCount = "";
        var lineCount = "";
        var perLine = "";
        txtElem = opts.txtElem;
        charElem = opts.charElem;
        lineElem = opts.lineElem;
        progElem = opts.progElem;
        progPerc = opts.progPerc;
        txtCount = parseInt(opts.txtCount) - 1;
        lineCount = parseInt(opts.lineCount) - 1;
        perLine = parseInt(opts.charPerLine);

        if(txtElem != undefined && txtCount != 0){

            $('#'+txtElem).on('input focus keyup keydown',_.debounce(function(e) {

                var text = $('#'+txtElem).val();
                text = $.trim(text.replace(/[\t\n]+/g, ''));
                var textLen = text.length;
                var cValue = parseInt(textLen) / parseInt(txtCount);
                var cPercent = cValue * 100;
                var reverse_count = txtCount - textLen;

                var textComplete = $('#'+txtElem).val();
                lCount = textComplete.split('\n').length;
                lCount = parseInt(lCount) - 1;
                var lValue = parseInt(lCount) / parseInt(lineCount);
                var lPercent = lValue * 100;

                if(lPercent>cPercent){
                    percent = lPercent;
                }else{
                    percent = cPercent;
                }
                
                if((textLen >= 0)){

                    if((textLen <= txtCount)){

                        if(progElem != undefined){
                            $('#'+progElem).css('width', percent + '%');
                        }

                        if(progPerc != undefined){
                            $('#'+progPerc).html(percent + '%');
                        }

                        if(charElem != undefined){
                            $("#"+charElem).html(textLen);
                        }

                        if(lineElem != undefined){
                            var content = $('#'+txtElem).val();
                            var line_count = content.split('\n').length;
                            $("#"+lineElem).html(parseInt(line_count));
                        }

                    }else{
                        var orig_text = $this.val();
                        var lines = orig_text.split("\n");
                        var total_txtCount = parseInt(txtCount) + parseInt(lines.length) - 1;
                        $this.val($this.val().substring(0,total_txtCount));
                        /*return false;*/
                    }

                }
            
            },50));

            if(lineElem != undefined && lineCount != 0 && perLine != 0){

                var lCount= 1;
                var chars= perLine;

                $("#"+txtElem).on('keydown',function(e){

                    var v = $('#'+txtElem).val();
                    var vl = v.replace(/(\r\n|\n|\r)/gm,"").length;
                    lCount = v.split('\n').length;

                    if(e.which == 13 && lCount > lineCount){
                        return false;
                    }

                   /* if (e.ctrlKey==true && (e.which == '118' || e.which == '86')) {
                        return false;
                    }*/

                    if(lCount <= lineCount){
                        if ((parseInt(vl/lCount) == chars) && e.which != 46 && e.which != 8) {
                            $('#'+txtElem).val(v + '\n');
                        }
                    }


                });
            }

            
        }
        
    };

    function nthIndex(str, pat, n){
        var L= str.length, i= -1;
        while(n-- && i++<L){
            i= str.indexOf(pat, i);
            if (i < 0) break;
            }
            return i;
    };
    

    /*Giving default value for options.*/
    $.fn.textareaCounter.defaults = {
        txtElem:undefined,
        charElem:undefined,
        lineElem:undefined,
        progElem:undefined,
        progPerc:undefined,
        txtCount:'0',
        lineCount:'0',
        charPerLine:'0',
    };

}(jQuery));

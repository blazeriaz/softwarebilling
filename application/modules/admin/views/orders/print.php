 <!-- Main Content -->
 <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY); ?>
<div class="container-fluid">
    <div class="side-body">
        <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td style="color:red;"><strong>GSTIN : <?php echo $gstin; ?></strong></td>
                            <td style="text-align: center"><strong><u>GST INVOICE / CASH BILL</u></strong></td>
                            <td style="text-align:right">Cell : <?php echo $phone; ?> / <?php echo $phone_sec; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="top">
                <td colspan="2"  style="padding:0;">
                    <table>
                        <tr>
                            <td>
                        <center><img style="width:50%" src="<?php echo base_url(); ?>assets/images/invoice-logo.jpg"></center> 
                            </td>                          
                            
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding:0;">
                    <table>
                        <tr>
                            <td style="padding:0;">
                        <center> Dealers in : IRON & STEEL</center> 
                            </td> 
                        </tr>
                        <tr>
                            <td style="padding:0;">
                        <center> <strong>
                           <?php echo $address; ?>
                        </center> 
                            </td> 
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding:0;">
                    <table style="border-top:1px solid;border-bottom:1px solid ">
                        <tr>
                            <td style="padding:5px;width:32%;border-right:1px solid">
                                Invoice No : NS / <b><?php echo $edit_order['order_id'];?></b> <br>
                                Transportation Mode : 
                            </td>
                            <td style="padding:5px;text-align:left;width:30%;border-right:1px solid">
                                Invoice Date : <b><?php echo date('d-m-Y',strtotime($edit_order['created'])); ?></b><br>
                                Payment Mode : 
                            </td>
                            <td style="padding:5px;width:37%">
                                State : TAMILNADU   State Code : 33 <br>
                                Vehicle No : <?php echo $vehicle_no;?>
                            </td>
                        </tr>                        
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding:0;">
                    <table style="border-bottom:1px solid;line-height: 19px;">
                        <tr>
                            <td style="padding:5px;width:47.7%;border-right:1px solid;">
                        <center>Name & Address of Buyer</center>
                            </td>
                            <td style="padding:5px;width:50%;text-align:left;">
                            <center> Delivery at</center>
                            </td>                           
                        </tr>                        
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2" style="padding:0">
                    <table style="border-bottom:1px solid">
                        <tr>
                            <td style="padding:5px;width:48.8%;border-right:1px solid;text-transform:capitalize; ">
                                <?php echo $billing_name_store; ?> <br>
                                <?php if(trim($cus_address) != ""){echo $cus_address.'<br>';} ?>                               
                               <?php if(trim($cus_phone_no) != ""){ echo $cus_phone_no.'<br>';} ?>
                               <?php if(trim($customer_gstin) != ""){ echo 'GSTIN : '.$customer_gstin;} ?><br>
                            </td>
                            
                            <td style="text-transform:capitalize;">
							<table style="border:0;">
							<tr style="height:50px;"><td>
                               <?php echo $delivery_at; ?>
							   </td>
							   </tr>
							   <?php if($way_bill != ""){ ?>
							   <tr>
							   <td>Way Bill No : <?php echo $way_bill ?></td>
							   </tr>
							   <?php } ?>
							   </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr style="font-size:12px;line-height:14px;" class="">
                <td colspan="2" style="padding:0">
                    <table style="border-bottom:1px solid">
                        <tr style="border-bottom:1px solid">
                            <td style="border-right:1px solid" width="5%"><center>SL.NO</center></td>
                            <td style="border-right:1px solid" width="43%"><center>DESCRIPTION</center></td>
                            <td style="border-right:1px solid" width="15"><center>HSN Code</center></td>
                            <td style="border-right:1px solid" width="5"><center>Weight<br>Kg</center></td>
                            <td style="border-right:1px solid" width="15%"><center>Rate Per<br>Ton</center></td>
                            <td width="15%"><center>Taxable Value</center> </td>
                        </tr>
                        <?php
						$weight = 0;						
						for($i=0;$i < count($edit_orderitems);$i++){ ?> 
                        <tr class="item">
                            <td style="border-right:1px solid">
                                <center><?php echo $i +1; ?></center>
                            </td>
                            <td style="border-right:1px solid;text-align:left"><?php 
			     $product_name = isset($edit_orderitems[$i]['product_name'])?$edit_orderitems[$i]['product_name']:'';
			     $product_options = isset($edit_orderitems[$i]['product_options'])?$edit_orderitems[$i]['product_options']:'';
					echo $product_name.' - '.$product_options;
				
			    ?>
                            </td>
                            <td style="border-right:1px solid"><?php 
			    echo $hsn_code = isset($edit_orderitems[$i]['hsn_code'])?$edit_orderitems[$i]['hsn_code']:'';
			    ?></td>
                            <td style="border-right:1px solid">
                            <center>
                                <?php
				echo $qty = isset($edit_orderitems[$i]['qty'])?$edit_orderitems[$i]['qty']:'';
				$weight = $weight + $qty;
				?>
                            </center>
                            </td>
                            <td style="border-right:1px solid;text-align:right;"><?php 
				$total_price = isset($edit_orderitems[$i]['unit_price'])?$edit_orderitems[$i]['unit_price']:'';
				//echo number_format($total_price , 3);
				echo $fmt->format($total_price);
				?>
                            </td>
                             <td style="text-align:right;"><?php
                           $taxable_amount = $edit_orderitems[$i]['total_price'];
                          
						   echo $fmt->format($taxable_amount);
                             ?> </td>
                        </tr>
                        <?php } ?>
                        
                        
                        <?php
                        $total_count = count($edit_orderitems);
                        if($total_count < 11){
                        $loop_of_empty_record = 11 - $total_count;
                        for($j = 1; $j <= $loop_of_empty_record; $j++){
                        ?>
                        <tr class="item">
                            <td style="border-right:1px solid">
                                &nbsp;
                            </td>
                            <td style="border-right:1px solid;text-align:left"> &nbsp; </td>
                            <td style="border-right:1px solid"> &nbsp;</td>
                            <td style="border-right:1px solid"> &nbsp; </td>
                            <td style="border-right:1px solid"> &nbsp;</td>
                             <td> &nbsp; </td>
                        </tr>
                        <?php } } ?>
                        
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border-top:1px solid;border-bottom:1px solid;border-right:1px solid;font-size:14px;line-height:12px;">
				<table border="0">
				<tr>
					<td style="text-align:right;">Total Weight : <?php echo number_format($weight,2); ?> kg</td>
				</tr>
				<tr>
				<td>
                    Total Invoice Amount in words :<br><br> <span style="text-transform:capitalize"><?php echo $grand_total_words; ?></span>
					</td>
					</tr>
					</table>
				</td>
                <td style="border-top:1px solid">   
                    <table border=1 style="line-height:12px;font-size:15px;">
                        <tr>
                            <td width="63%"><small>Total Amount Before Tax</small></td>
                            <td width="37%"><?php echo $fmt->format($edit_order['total']);?></td>
                        </tr>
                        <tr>
                            <td><small>Handling Charges</small></td>
                            <td><?php echo $fmt->format($edit_order['handling_charge']);?></td>
                        </tr>
                        <tr>
                            <td><small>Transport Charges</small></td>
                            <td><?php echo $fmt->format($edit_order['transport_charge']);?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr style="font-size:14px;">
                <td style="border-top:1px solid;border-bottom:1px solid;border-right:1px solid">
                    <table border="1px solid">
                        <tr>
                            <td width="50%"><?php echo $bank_details; ?></td>
                            <td width="50%" style="text-align:center;">Total GST Amount</td>
                        </tr>                      
                        
                    </table>
                </td>
                <td style="border-top:1px solid">   
                    <table border=1 style="line-height:12px;">
                        <tr>
                            <td width="63%">Total</td>
                            <td width="37%"><?php 
                           $order_total = $edit_order['handling_charge'] + $edit_order['transport_charge'] + $edit_order['total'];
                             echo $fmt->format($order_total);?>
							</td>
                        </tr>
                        <tr>
                            <td>Add : CGST <?php echo $cgst_tax_percentage; ?>%</td>
                            <td>
							<?php if($edit_order['display_igst'] == 0){ ?> 
							<?php echo $fmt->format($edit_order['c_tax_amount'] + $edit_order['handling_charge_tax'] + $edit_order['transport_charge_tax']); ?>
							<?php } ?>
							</td>
                        </tr>
                        <tr>
                            <td>Add : SGST <?php echo $sgst_tax_percentage; ?>%</td>
                            <td>
							<?php if($edit_order['display_igst'] == 0){ ?> 
							<?php echo $fmt->format($edit_order['s_tax_amount'] + $edit_order['handling_charge_stax'] + $edit_order['transport_charge_stax']); ?>
							<?php } ?>
							</td>
                        </tr>
						<?php if($edit_order['display_igst'] == 1){ ?> 
                        <tr>
                            <td>Add : IGST <?php echo $total_tax_percentage; ?>%</td>
                            <td>					
							<?php
                            $igst = $edit_order['c_tax_amount'] + $edit_order['s_tax_amount'] + $edit_order['handling_charge_tax'] + $edit_order['handling_charge_stax'] + $edit_order['transport_charge_tax'] + $edit_order['transport_charge_stax'];
                            echo $fmt->format($igst); ?>							
							</td>
                        </tr>
						<?php } ?>
						<?php if($edit_order['display_tcs'] == 1){ ?> 
						 <tr>
                            <td>Add : TCS Tax <?php echo $edit_order['tcs_percent']; ?>%</td>
                            <td>
							
							<?php
                            $igst = $edit_order['c_tax_amount'] + $edit_order['s_tax_amount'] + $edit_order['handling_charge_tax'] + $edit_order['handling_charge_stax'] + $edit_order['transport_charge_tax'] + $edit_order['transport_charge_stax'];
                            echo $fmt->format($edit_order['tcs_amount']); ?>
							
							</td>
                        </tr>
						<?php } ?>
                        <?php if($edit_order['discount'] > 0){ ?>
                        <tr>
                            <td>Discount</td>
                            <td><?php echo number_format($edit_order['discount'],2);
                            ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td>Total Amount After Tax</td>
                            <td><?php 
							$total_tax = $edit_order['c_tax_amount'] + $edit_order['s_tax_amount'] +$edit_order['transport_charge_tax'] + $edit_order['handling_charge_tax']+$edit_order['transport_charge_stax']+$edit_order['handling_charge_stax'] ;
							$grand_total = $total_tax + $edit_order['total'] + $edit_order['transport_charge'] + $edit_order['handling_charge'];
							   echo $fmt->format(round($edit_order['grand_total']));		
								
							 ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width:60%">
                    <table border="1">
                        <tr>
                            <td style="font-size:10px;line-height:15px;">
                                <?php echo $terms; ?>
                               </td>
                            <td style="text-align:left;font-size:12px;">Receivers Signature</td>
                        </tr>
                    </table>
                    
                </td>
                <td style="font-size:10px;line-height: 12px;">
                    <table border="1">
                        <tr>                           
                            
                            <td>Certified that the particulars given above are true and correct<br>
                        <center> <b>For NOOR STEELS</b></center><br><br><br>
                        <center>Authorized Signature </center>
                            </td>
                        </tr>
                    </table>
                </td>
                
            </tr>          
            
        </table>
        </div>
		
			
    </div>
</div>

 <style>
     .logo-size{
         font-size: 50px;
    font-weight: bolder;
    font-family: initial;
    color: red;
     }
    .invoice-box {
        max-width: 800px;
        margin: auto;
       
        border: 1px solid #000;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
       /* padding-bottom: 20px;*/
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 0px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>


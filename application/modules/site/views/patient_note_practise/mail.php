<tr>
	<td align="center" valign="top" style="display:block;margin-bottom:20px;border:1px solid #fff;border-width:1px;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="50%" colspan="2" align="left" bgcolor="#4bacc6" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 0 5px 10px;"><p>Diagnosis # 1</p></td>							
				<td width="50%" align="left" bgcolor="#4bacc6" valign="top"  style="font:bold 15px Tahoma;color:#fff;padding:5px 0;text-decoration:none;"><?php echo $patient_note_list['diagnosis_one_title']; ?></td>
			</tr>
			<tr>
				<td align="left"  colspan="3" valign="top" bgcolor="#fff" style="padding:0 10px">&nbsp;</td>
			</tr>						
			<tr>
				<td width="5%" align="left" bgcolor="#4bacc6" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 10px 5px;border-right:3px solid #fff;border-bottom:2px solid #fff;"><p>&nbsp;</p></td>
				<td width="40%" align="left" bgcolor="#4bacc6" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 10px 5px;border-right:3px solid #fff;border-bottom:2px solid #fff;"><p>History</p></td>
				<td width="50%" align="left" bgcolor="#4bacc6" valign="top"  style="font:bold 15px Tahoma;color:#fff;padding:5px 10px;border-bottom:2px solid #fff;"><p>PE</p></td>
			</tr>
			<?php 
				//ksort($diagnosis_details_list[1]);
			?>
			<?php foreach($diagnosis_details_list[1] as $count => $diag_one){ ?>
			<tr>
				<td width="5%" align="left" bgcolor="#4bacc6" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 10px 5px;border-right:3px solid #fff;border-bottom:2px solid #fff;"><p><?php echo ++$count; ?></p></td>
				<td width="45%" align="left" bgcolor="#a5d5e2" valign="top" style="font:normal 15px Tahoma;color:#000;padding:5px 10px 5px;border-right:3px solid #fff;border-bottom:2px solid #fff;"><p><?php echo $diag_one[0]; ?></p></td>
				<td width="50%" align="left" bgcolor="#a5d5e2" valign="top"  style="font:normal 15px Tahoma;color:#000;padding:5px 10px;border-bottom:2px solid #fff;"><p><?php echo $diag_one[1]; ?></p></td>
			</tr>	
			<?php } ?>
		</table>
	</td>
</tr>
<tr>
	<td align="center" valign="top" style="display:block;margin-bottom:20px;border:1px solid #000;border-width:1px;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="50%" colspan="2" align="left" bgcolor="#8064a2" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 0 5px 10px;"><p>Diagnosis #2</p></td>							
				<td width="50%" align="left" bgcolor="#8064a2" valign="top"  style="font:bold 15px Tahoma;color:#fff;padding:5px 0;text-decoration:none;"><?php echo $patient_note_list['diagnosis_two_title']; ?></td>
			</tr>
			<tr>
				<td align="left"  colspan="3" valign="top" bgcolor="#fff" style="padding:0 10px">&nbsp;</td>
			</tr>						
			<tr>
				<td width="5%" align="left" bgcolor="#8064a2" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 10px 5px;border-right:1px solid #000;border-bottom:1px solid #000;"><p>&nbsp;</p></td>
				<td width="40%" align="left" bgcolor="#8064a2" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 10px 5px;border-right:1px solid #000;border-bottom:1px solid #000;"><p>History</p></td>
				<td width="50%" align="left" bgcolor="#8064a2" valign="top"  style="font:bold 15px Tahoma;color:#fff;padding:5px 10px;border-bottom:1px solid #000;"><p>PE</p></td>
			</tr>
			<?php 
				//ksort($diagnosis_details_list[2]);
			?>
			<?php foreach($diagnosis_details_list[2] as $count => $diag_two){ ?>
			<tr>
				<td width="5%" align="left" bgcolor="#8064a2" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 10px 5px;border-right:1px solid #000;border-bottom:1px solid #000;"><p><?php echo ++$count; ?></p></td>
				<td width="45%" align="left" bgcolor="#d8d8d8" valign="top" style="font:normal 15px Tahoma;color:#000;padding:5px 10px 5px;border-right:1px solid #000;border-bottom:1px solid #000;"><p><?php echo $diag_two[0]; ?></p></td>
				<td width="50%" align="left" bgcolor="#d8d8d8" valign="top"  style="font:normal 15px Tahoma;color:#000;padding:5px 10px;border-bottom:1px solid #000;"><p><?php echo $diag_two[1]; ?></p></td>
			</tr>	
			<?php } ?>
		</table>
	</td>
</tr>
<tr>
	<td align="center" valign="top" style="display:block;margin-bottom:20px;border:1px solid #fff;border-width:1px;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="50%" colspan="2" align="left" bgcolor="#4bacc6" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 0 5px 10px;"><p>Diagnosis # 3</p></td>							
				<td width="50%" align="left" bgcolor="#4bacc6" valign="top"  style="font:bold 15px Tahoma;color:#fff;padding:5px 0;text-decoration:none;"><?php echo $patient_note_list['diagnosis_three_title']; ?></td>
			</tr>
			<tr>
				<td align="left"  colspan="3" valign="top" bgcolor="#fff" style="padding:0 10px">&nbsp;</td>
			</tr>						
			<tr>
				<td width="5%" align="left" bgcolor="#4bacc6" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 10px 5px;border-right:3px solid #fff;border-bottom:2px solid #fff;"><p>&nbsp;</p></td>
				<td width="40%" align="left" bgcolor="#4bacc6" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 10px 5px;border-right:3px solid #fff;border-bottom:2px solid #fff;"><p>History</p></td>
				<td width="50%" align="left" bgcolor="#4bacc6" valign="top"  style="font:bold 15px Tahoma;color:#fff;padding:5px 10px;border-bottom:2px solid #fff;"><p>PE</p></td>
			</tr>
			<?php 
				//ksort($diagnosis_details_list[3]);
			?>
			<?php foreach($diagnosis_details_list[3] as $count => $diag_three){ ?>
			<tr>
				<td width="5%" align="left" bgcolor="#4bacc6" valign="top" style="font:bold 15px Tahoma;color:#fff;padding:5px 10px 5px;border-right:3px solid #fff;border-bottom:2px solid #fff;"><p><?php echo ++$count; ?></p></td>
				<td width="45%" align="left" bgcolor="#a5d5e2" valign="top" style="font:normal 15px Tahoma;color:#000;padding:5px 10px 5px;border-right:3px solid #fff;border-bottom:2px solid #fff;"><p><?php echo $diag_three[0]; ?></p></td>
				<td width="50%" align="left" bgcolor="#a5d5e2" valign="top"  style="font:normal 15px Tahoma;color:#000;padding:5px 10px;border-bottom:2px solid #fff;"><p><?php echo $diag_three[1]; ?></p></td>
			</tr>	
			<?php } ?>
		</table>
	</td>
</tr>
<tr>
	<td align="center" valign="top" style="display:block;margin-bottom:0;border:1px solid #000;border-width:1px;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="100%" colspan="2" align="left" bgcolor="#a6a6a6" valign="top" style="font:bold 15px Tahoma;color:#000;padding:5px 0 5px 10px;border-bottom:1px solid #000;"><p>Diagnostic Study/Studies</p></td>														
			</tr>
			<?php 
				//ksort($diagnosis_details_list[4]);
			?>
			<?php foreach($diagnosis_details_list[4] as $count => $diag_four){ ?>
			<tr>
				<td width="5%" align="left" bgcolor="#eeece1" valign="top" style="font:normal 15px Tahoma;color:#000;padding:5px 10px 5px;border-right:1px solid #000;border-bottom:1px solid #000;"><p><?php echo ++$count; ?></p></td>
				<td width="95%" align="left" bgcolor="#eeece1" valign="top" style="font:normal 15px Tahoma;color:#000;padding:5px 10px 5px;border-bottom:1px solid #000;"><p><?php echo $diag_four[0]; ?></p></td>						
			</tr>	
			<?php } ?>
		</table>
	</td>
</tr>
<tr>
	<td align="center" valign="top" style="border-bottom:5px solid #00355d">&nbsp;</td>
</tr>
		

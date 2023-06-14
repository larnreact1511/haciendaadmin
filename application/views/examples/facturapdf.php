<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Factura</title>
    <link href="<?php echo base_url('assets/css/puntoventa.css') ?>" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="page-wrap">
	<!--
	<div id="header" 
		style="margin: 20px 0; background: #222;text-align: center; color: #fff; font-size: 2em; letter-spacing: 4px; padding: 10px 0;"
	>
        //Factura de venta 
    </div>
	-->
	<div class="header" style="text-align: center;">
		<img 
			id="image" 
			src="<?php echo base_url();?>uploads/company_logo.png" 
			style="height:100px;"
			alt="company_logo"
		>
		<br>
		<?php echo $info[1]->value."<br>".$info[0]->value;?>
	</div>
	<div id="block1" style="margin: 0;padding: 0;">
		<div id="customer-title" style="height: 100px;float: right;margin-top: 40px;">
			<div id="customer" style="margin: 0; padding: 0;">
                <?php echo $customer->company_name;?><br>
				<?php echo $customer->phone_number;?><br>
				<?php echo $customer->zip.''.$customer->city;?><br>
				<?php echo $customer->state;?>
			</div>
		</div>
		<!--
		<div id="logo"style="text-align: right; margin-top: 15px;float: left; border: 1px solid #fff;">
			<div>&nbsp;</div>
			<div id="company_name" style="text-align: center;" >
					<?php echo $info[0]->value;?>
			</div>
		</div> -->
		<!--
		<div id="logo">
			<img id="image" src="http://localhost/haciiendapuntoventa/public/uploads/company_logo.png" alt="company_logo">
			<div>&nbsp;</div>
			<div id="company_name">SIEMBRA INVERSIONES, C.A. J-50170383-3</div>
		</div>-->
	</div><br><br><br><br><br><br><br><br>
		<div id="block2" style="width: 100%;">
			<div id="company-title" style="float: left;">
			        <?php echo $sales[0]->payment_type;  ?>
					
			</div>
			<table id="meta" style="margin-top: 1px;width: 300px;float: right;" >
				<tbody>
					<tr>
						<td class="meta-head" style="text-align: left; background: #eee;">Factura # </td>
						<td>
							<?php echo $invoice_number?>
						</td>
					</tr>
					<tr>
						<td class="meta-head" style="text-align: left; background: #eee;">Fecha</td>
						<td>
							<?php echo $sales[0]->sale_time;?>
						</td>
					</tr>
					<tr>
						<td class="meta-head" style="text-align: left; background: #eee;">Total Facturado</td>
						<td>
							<?php echo $sales[0]->payment_amount ;?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

	<table id="items" style="clear: both;width: 100%;margin: 30px 0 0; border: 1px solid #000;">
		<tbody>
			<tr>
				
				<th colspan="2">Nombre del Artículo</th>
				<th>Cantidad</th>
				<th colspan="2">Precio</th>
				<th hidden="">Descuento</th>
				<th>Total</th>
			</tr>
			<?php
				$total=0;
				foreach($items as $item)
				{
					?>
						<tr class="item-row">
							<td colspan="2" class="item-name">
								<?php echo $item->nombrrproducto ;?>	 				
							</td>
							<td style="text-align:center;">
							<?php echo (int)$item->quantity_purchased ;?>	
							</td>
							<td colspan="2" style="text-align:center;">
							<?php echo number_format($item->item_unit_price,0, ",", ".") ;?>			
							</td>
							<td hidden="" style="text-align:center;">
							<?php echo number_format($item->discount,2, ",", ".") .'%';?>					
							</td>
								<td style="border-right: solid 1px; text-align:right;">
								<?php 
									$total = floatval($total) +( floatval($item->item_unit_price)	* ((int)$item->quantity_purchased));
									echo number_format( ($item->item_unit_price) *((int)$item->quantity_purchased)    ,0, ",", ".");
								?>					
							</td>
						</tr>
					<?php
				}
			?>
			
				
			<tr>
				<td class="blank" style="border: 0;" colspan="6" align="center">&nbsp;</td>
			</tr>

			<tr>
				<td colspan="2" class="blank-bottom" style="border: 1px;"> </td>
				<td rowspan="4"> 
					Expresado a tasa BCV <?php echo number_format($sales[0]->exchangerate,4, ",", ".") ;?>  <br>
					Subtotal Bs. <?php  echo number_format($sales[0]->subtotal,2, ",", ".")  ?><br>
					IVA 16%  Bs. <?php echo  number_format( ( floatval($sales[0]->iva) * ($sales[0]->exchangerate) ) ,2, ",", ".") ?> <br>
					Total        Bs.  <?php echo  number_format($sales[0]->total,2, ",", ".") ;?> <br>			</td>
				<td colspan="2" class="total-line" style="border-right: 0; text-align: right;"> Base imponible </td>
				<td class="total-value" id="subtotal">
					<?php echo '$'.number_format( (  floatval($sales[0]->payment_amount)-floatval($sales[0]->iva) ) ,2, ",", ".") ;?>			
				</td>
			</tr>	
			<tr>
				
				<td colspan="3" class="blank"> </td>
				<td colspan="2" class="total-line" style="border-right: 0; text-align: right;" > Iva</td>
				<td class="total-value" id="total">
					<?php echo '$'.number_format($sales[0]->iva,2, ",", ".") ;?>	
					
				</td>
			</tr>
			<tr>
				<td colspan="3" class="blank"> </td>
				<td colspan="2" class="total-line" style="border-right: 0; text-align: right;">Total </td>
				<td class="total-value" id="paid">
					<?php echo '$'.number_format($sales[0]->payment_amount,2, ",", ".") ;?>	
				</td>
			</tr>
			
		
		</tbody>
	</table>
	<div style=" font-weight:bolder; margin:10px; ">
		Cumpliendo con el Art. 25 de la Ley del IVA, 
		se establece la conversión a Bs. según el tipo de 
		cambio BCV vigente a la fecha&nbsp;de&nbsp;la&nbsp;factura
	</div>
</div>


</body>
	
</html>
<script>
	function imprimir()
	{
		console.log('imprimie')
		window.print();
	}
</script>
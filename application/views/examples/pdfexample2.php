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
	<div id="header">Factura de venta</div>
	<div id="block1">
		<div id="customer-title" >
			<div id="customer" >
				personal<br>
				04247574613<br>
				5001 SAN CRISTOBAL<br>
				TACHIRA
			</div>
		</div>
		<div id="logo" >
			<div>&nbsp;</div>
				<div id="company_name">
                     <?php echo $info[0]->value;?>1
                </div>
			</div>
		</div>
		<div id="block2">
			<div id="company-title">
			<?php echo $info[1]->value;?>
					<br>
					<?php echo $info[2]->value;?>
			</div>
			<table id="meta">
				<tbody>
					<tr>
						<td class="meta-head" >Factura # </td>
						<td>
							<?php echo $nro?>
						</td>
					</tr>
					<tr>
						<td class="meta-head">Fecha</td>
						<td>
							<?php echo $sales[0]->sale_time;?>
						</td>
					</tr>
					<tr>
						<td class="meta-head">Total Facturado</td>
						<td>
							<?php echo $sales[0]->payment_amount ;?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

	<table id="items">
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
				<td class="blank" colspan="6" align="center">&nbsp;</td>
			</tr>

			<tr>
				<td colspan="2" class="blank-bottom"> </td>
				<td rowspan="4"> 
					Expresado a tasa BCV <?php echo number_format($sales[0]->exchangerate,4, ",", ".") ;?>  <br>
					Subtotal Bs. <?php  echo number_format($sales[0]->subtotal,4, ",", ".")  ?><br>
					IVA 16%  Bs. <?php echo  number_format($sales[0]->iva,4, ",", ".") ?> <br>
					Total        Bs.  <?php echo  number_format($sales[0]->total,4, ",", ".") ;?> <br>			</td>
				<td colspan="2" class="total-line">SubTotal</td>
				<td class="total-value" id="subtotal">
					<?php echo '$'.number_format($total,2, ",", ".") ;?>				
				</td>
			</tr>	
			<tr>
				
				<td colspan="3" class="blank"> </td>
				<td colspan="2" class="total-line">Total</td>
				<td class="total-value" id="total">
					<?php echo '$'.number_format($total,2, ",", ".") ;?>	
				</td>
			</tr>
			<tr>
				<td colspan="3" class="blank"> </td>
				<td colspan="2" class="total-line">venta a credito (TBD)</td>
				<td class="total-value" id="paid">
					<?php echo '$'.number_format($total,2, ",", ".") ;?>	
				</td>
			</tr>
			<tr>
				<td colspan="3" class="blank"> </td>
				<td colspan="2" class="total-line">Cambio a tasa</td>
				<td class="total-value" id="change">
				<?php 
					if ( isset($sales[0]->exchangerate))
					{
						$cambio = floatval($sales[0]->exchangerate)* floatval($total);
						echo  number_format($cambio,4, ",", ".").' BS';
					}
				?>
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
<!--sub-heard-part-->
									  <div class="sub-heard-part">
									   <ol class="breadcrumb m-b-0">
											<li><a href="inicio.html">Inicio</a></li>
											<li class="active">Calculo Remuneraciones</li>
											
										</ol>
									   </div>
								  <!--//sub-heard-part-->

									<div class="graph-visual tables-main">
											
									        <?php if(isset($message)): ?>
									         <div class="row">
									            <div class="col-md-12">
									                      <div class="alert alert-<?php echo $classmessage; ?> alert-dismissable">
									                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									                        <h4><i class="icon fa <?php echo $icon;?>"></i> Alerta!</h4>
									                        <?php echo $message;?>
									                      </div>
									            </div>            
									          </div>
									          <?php endif; ?>

											
														  <div class="graph">

														  	
															<div class="tables">
																<table class="table"> 
																	<thead> 
																		<tr>
																			<th>#</th>
																			<th>Per&iacute;odo</th> 
																			<th>Estado</th> 
																			<th>Acci&oacute;n</th> 
																			<th>Ver Detalle Remunraciones</th> 
																			<th>Validar</th> 
																			

																		</tr> 
																	</thead> 
																	<tbody> 
                    												<?php if(count($periodos_remuneracion) > 0){ ?>	
                    													<?php $i = 1; ?>	
                      													<?php foreach($periodos_remuneracion as $periodo){ ?>															
																		<tr class="active" id="variable">
																			<td><?php echo $i;?></td>
																			<td><?php echo date2string($periodo->mes,$periodo->anno); ?></td> 
																			 <td><span class="<?php echo $periodo->estado == 'Informaci&oacute;n Completa' ? 'text-green' : 'text-red';?>" /><?php echo $periodo->estado; ?></span>&nbsp;&nbsp;
                        													<?php if($periodo->estado == 'Falta Informaci&oacute;n'){ ?><i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="<?php echo $mensaje_html[$periodo->id];?>" title="Datos Pendientes:"></i><?php } ?>
                        													</td>
																			<td>
																					<?php if($periodo->estado == 'Informaci&oacute;n Completa' && is_null($periodo->cierre)){ ?>
																					<a href="<?php echo base_url(); ?>rrhh/submit_calculo_remuneraciones/<?php echo $periodo->id; ?>" data-toggle="tooltip" title="Calculo Remuneraciones" class="btn btn-block btn-xs btn-primary">Calcular</a>
																					<?php }else{ ?>
                            																&nbsp;
                         															<?php } ?>
																			</td>
																			
																			<td>
																				<?php if($periodo->estado == 'Informaci&oacute;n Completa' && !is_null($periodo->cierre)){ ?>
                             														<center><a href="<?php echo base_url(); ?>rrhh/periodos/<?php echo $periodo->id; ?>" data-toggle="tooltip" title="Ver Per&iacute;odo"><span class="glyphicon glyphicon-search"></span></a></center>
                        														<?php }else{  ?>
                           															&nbsp;
                        														<?php } ?>
																			</td> 
																			<td>
																				<?php if($periodo->estado == 'Informaci&oacute;n Completa' && !is_null($periodo->cierre)){ ?>
                            															<a href="#" data-href="<?php echo base_url(); ?>rrhh/aprueba_remuneraciones/<?php echo $periodo->id; ?>" data-toggle="modal" data-target="#confirm-publish" title="Aprobar" class="btn btn-xs btn-success"><span class="fa fa-check"></span></a>
                            														<a href="<?php echo base_url(); ?>rrhh/rechaza_remuneraciones/<?php echo $periodo->id; ?>" data-toggle="tooltip" title="Rechazar" class="btn btn-xs btn-danger"><span class="fa fa-times"></span></a>
                          														<?php }else{ ?>
                            															&nbsp;
                          														<?php } ?>																				

																			</td> 
																		</tr> 
																			<?php 
																				$i++;
																			} ?>
                    												<?php }else{ ?>
                    															<tr>
                      																<td colspan="6">No existen per&iacute;odos para C&aacute;lculo de Remuneraciones</td>
                    															</tr>
                    												<?php } ?>
																	</tbody> 
																</table> 
																
															</div>
												
													</div>
													
											</div>
									<!--/charts-inner-->

    <div class="modal fade" id="confirm-publish" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmar Aprobaci&oacute;n</h4>
                </div>
            
                <div class="modal-body">
                    <p>Se traspasar&aacute; la informaci&oacute;n de remuneraciones.&nbsp;&nbsp;Una vez aprobado, no podr&aacute; reversar la transacci&oacute;n.</p>
                    <p>Desea continuar?</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success btn-ok">Aprobar</a>
                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
      trigger : 'hover',
    html: true,});   
});
</script>
<style type="text/css">
  .bs-example{
      margin: 300px 50px;
    }
</style>


    <script>
        $('#confirm-publish').on('show.bs.modal', function(e) {

            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
        });
    </script>
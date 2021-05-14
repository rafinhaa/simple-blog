<?php

function createModalButton($button_name,$class,$data_target){
	echo anchor('',$button_name, ['class'=>$class,'data-toggle'=>'modal','data-target'=>$data_target]);
}

function createModalMessage($type,$data_target,$modal_title,$modal_body,$link,$button_name=NULL){
	echo '
	<div class="modal fade" id="'.$data_target.'">
		<div class="modal-dialog">
			<div class="modal-content bg-'.$type.'">
				<div class="modal-header">
					<h4 class="modal-title">'.$modal_title.'</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>'.$modal_body.'</p>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-light" data-dismiss="modal">Voltar</button>
					<a href="'.$link.'" type="button" class="btn btn-outline-light">'. (!is_null($button_name) ? $button_name : 'Sim') .'</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	';
}

?>
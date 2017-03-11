<?php
plantilla::inicio();
echo $cod;
$CI =& get_instance();
$sql = "select * from imagenes where id = ?";
$rs = $CI->db->query($sql, array($cod));
$rs = $rs->result();
if(count($rs) == 0){
  redirect('web');
}
$imagen = $rs[0];
 ?>


 <div class="container-fluid text-center">
   <h1><?php echo $imagen->nombre ?></h1>
   <div class="thumbnail">
     <img src="<?php echo base_url("fotos/{$imagen->id}.png");?>" class="img-responsive"/>
       <p><strong><?php echo $imagen->comentario ?></strong></p>
     </div>

   </div>
 </div>

<?php
plantilla::inicio();
$CI =& get_instance();
if($_POST && $_FILES['foto']['type'] == 'image/jpeg'){
   $f = new stdClass();
   $f->nombre = $_POST['nombre'];
   $f->comentario = $_POST['comentario'];
   $f->fecha = time();
   $foto = $_FILES['foto'];
   $CI->db->where('id',$cod);
   $CI->db->update("imagenes",$f);
   if($foto['error'] == 0){
      $tmp = "fotos/{$cod}.jpg";
      move_uploaded_file($foto['tmp_name'],$tmp);
    }
    redirect('admin');
  }
 ?>

 <div class="container-fluid text-center">
   <div class="jumbotron" id="bj_edit">
     <div class="row">
       <div class="col-sm-12">
         <form enctype="multipart/form-data" action="" method="post">
                  <div class="form-group input-group">
               <label for="nombre" class="input-group-addon bg-dark-blue" >Nombre:</label>
               <input type="text" name="nombre" class="form-control" required id="nom_img" />
            </div>
            <div class="form-group input-group">
               <label for="comentario" class="input-group-addon bg-dark-blue">Comentario:</label>
               <textarea name="comentario" class="form-control" id="com_img"></textarea>
            </div>
            <div class="form-group input-group">
               <label for="foto" class="input-group-addon bg-dark-blue">Imagen:</label>
               <input type="file" name="foto" class="form-control" required accept="image/jpeg"/>
            </div>
            <div class="text-center">
               <button type="submit" class="btn bg-dark-blue">Actualizar</button>
            </div>
         </form>
       </div>
     </div>
   </div>
 </div>

 <script src="<?php echo base_url('js') ?>/loadEdit.js"></script>

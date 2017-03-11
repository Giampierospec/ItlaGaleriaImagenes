<?php
$CI =& get_instance();
$mensaje= '';
if($_POST && $_FILES['foto']['type'] == 'image/png'){
   $f = new stdClass();
   $f->nombre = $_POST['nombre'];
   $f->comentario = $_POST['comentario'];
   $f->fecha = time();

   $CI->db->insert('imagenes',$f);
   $foto = $_FILES['foto'];
   $cod = $this->db->insert_id();
   if($foto['error'] == 0){
      $tmp = "fotos/{$cod}.png";
      move_uploaded_file($foto['tmp_name'],$tmp);
   }


}
else{
   $mensaje = "La foto no es png porfavor busque una foto png";
}

plantilla::inicio();

 ?>
 <div class="text-right">
    <a href="<?php echo base_url('admin/salir');?>" class="btn btn-danger">Salir</a>
 </div>
<fieldset>
   <legend>Agregar Imagen</legend>
   <form enctype="multipart/form-data" action="" method="post">
      <div class="col col-sm-4">


      <div class="form-group input-group">
         <label for="nombre" class="input-group-addon">Nombre:</label>
         <input type="text" name="nombre" class="form-control" required />
      </div>
      <div class="form-group input-group">
         <label for="comentario" class="input-group-addon">Comentario:</label>
         <textarea name="comentario" class="form-control"></textarea>
      </div>
      <div class="form-group input-group">
         <label for="foto" class="input-group-addon">Imagen:</label>
         <input type="file" name="foto" class="form-control" required accept="image/*"/>
      </div>
      <div class="text-center" style="color:red;">
         <?php echo $mensaje; ?>
      </div>
      <div>
         <button type="submit" class="btn btn-success">Guardar</button>
      </div>
   </div>
   </form>
</fieldset>

 <fieldset>
   <legend>Imagenes Agregadas</legend>
   <table class="table">
     <thead>
       <tr>
         <th>Img</th>
         <th>Cod</th>
         <th>Nombre</th>
         <th>Comentario</th>
       </tr>
     </thead>
     <tbody>
        <?php
        $imagenes = cargar_imagenes();
        foreach ($imagenes as $imagen) {
           echo "<tr>
           <td><img src='fotos/{$imagen->id}.png' height='50'/></td>
           <td>{$imagen->id}</td>
           <td>{$imagen->nombre}</td>
           <td>{$imagen->comentario}</td>
           </tr>";
        }
         ?>
     </tbody>
   </table>
 </fieldset>

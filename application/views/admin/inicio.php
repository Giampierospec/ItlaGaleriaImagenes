<?php
$CI =& get_instance();
$mensaje= '';
if($_POST && $_FILES['foto']['type'] == 'image/jpeg'){
   $f = new stdClass();
   $f->nombre = $_POST['nombre'];
   $f->comentario = $_POST['comentario'];
   $f->fecha = time();

   $CI->db->insert('imagenes',$f);
   $foto = $_FILES['foto'];
   $cod = $this->db->insert_id();
   if($foto['error'] == 0){
      $tmp = "fotos/{$cod}.jpg";
      move_uploaded_file($foto['tmp_name'],$tmp);
   }

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
         <textarea name="comentario" class="form-control" ></textarea>
      </div>
      <div class="form-group input-group">
         <label for="foto" class="input-group-addon">Imagen:</label>
         <input type="file" name="foto" class="form-control" required accept="image/jpeg"/>
      </div>
      <div class="text-center" style="color:red;">
         <?php echo $mensaje; ?>
      </div>
      <div>
         <button type="submit" class="btn btn-success" >Guardar</button>
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
        $admin = base_url('admin');
        foreach ($imagenes as $imagen) {
           echo "<tr>
           <td><img src='fotos/{$imagen->id}.jpg' height='50'/></td>
           <td>{$imagen->id}</td>
           <td>{$imagen->nombre}</td>
           <td>{$imagen->comentario}</td>"
           ?>
           <td> <a href='#' class='btn btn-default' onclick='confirmationEdit("<?php echo $imagen->id ?>","<?php echo $imagen->nombre ?>","<?php echo $imagen->comentario ?>");'><i class='fa fa-pencil-square-o'></i> Editar</a></td>
           <td> <a href='#' class='btn btn-danger' onclick='confirmationDelete("<?php echo $imagen->id ?>");'><i class='fa fa-trash'></i> Eliminar</a></td>
           <?php
           echo "</tr>";
        }
         ?>
     </tbody>
   </table>
 </fieldset>

 <script type="text/javascript">
function image(nom_img, com_img){
   this.nombre = nom_img;
   this.comentario = com_img;
}
function save(r){
var datos = JSON.stringify(r);
localStorage.setItem("inputsImagen",datos);
}
 function confirmationEdit(id_img,nom_img, img_cm){
    if(confirm("¿Esta seguro que quiere editar?")){
      var nom_img = String(nom_img);
      var com_img = String(img_cm);
      var r = new image(nom_img,com_img);
      save(r);
      window.open("<?php echo $admin?>/edit/"+id_img,"_self");
   }

}
function confirmationDelete(id_img){
   if(confirm("¿Esta seguro que quiere Eliminar?")){
     window.open("<?php echo $admin?>/delete/"+id_img,"_self");
  }
}
 </script>

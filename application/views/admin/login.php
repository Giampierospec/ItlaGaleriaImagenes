<?php
$mensaje = "";
if($_POST){
   $sql = "select * from usuarios where correo = ? and clave = ?";
   $CI =& get_instance();
   $correo = $_POST['correo'];
   $clave = md5($_POST['clave']);
   $rs = $CI->db->query($sql, array($correo, $clave));

   $rs = $rs->result();
   if(count($rs)>0){
      $_SESSION['gale_user'] = $rs[0];
      redirect('admin');
   }
   else{
      $mensaje = "Usuario o clave no validos";
   }
}
plantilla::inicio();

 ?>

 <div class="row">
   <div class="col col-sm-4 col-sm-offset-4">
     <form  action="" method="post">
        <h3>Ingresa al sistema</h3>
        <div class="form-group input-group">
           <label for="correo" class="input-group-addon">Usuario:</label>
           <input type="text" name="correo" class="form-control" required placeholder=" por ejemplo user@example.com"/>
        </div>
        <div class="form-group input-group">
           <label for="clave" class="input-group-addon">Clave:</label>
           <input type="password" name="clave" class="form-control" required/>
        </div>
        <div class="text-center" style="color:red;">

           <p><?php echo $mensaje ?></p>
        </div>
        <div class="text-center">
           <button type="submit" class="btn btn-primary">Ingresar</button>
        </div>
     </form>
   </div>
 </div>

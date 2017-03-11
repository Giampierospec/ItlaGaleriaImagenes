<?php
plantilla::inicio();
 ?>
<!-- Page Heading -->
<div class="row text-center">
    <div class="col-lg-12">
        <h1 class="page-header">Nuestras Imágenes
            <small> Homework</small>
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
<?php
    $imagenes = cargar_imagenes();
    $url =   base_url('');

    foreach($imagenes as $imagen){
        $foto = "fotos/{$imagen->id}.png";
        if(!is_file($foto)){
            $foto = "http://placehold.it/750x450/?text=no_foto";
        }
        else{
            $foto = "{$url}/{$foto}";
        }
        echo "<div class='col-md-3 portfolio-item'>
            <div class='thumbnail'>
            <a href='{$url}/web/ver_foto/{$imagen->id}'>
                <img class='img-responsive' src='{$foto}' alt=''>
            </a>
        </div>
        </div>";
    }
?>
</div>


<hr>

<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
            <li>
                <a href="#">&laquo;</a>
            </li>
            <li class="active">
                <a href="#">1</a>
            </li>
            <li>
                <a href="#">2</a>
            </li>
            <li>
                <a href="#">3</a>
            </li>
            <li>
                <a href="#">4</a>
            </li>
            <li>
                <a href="#">5</a>
            </li>
            <li>
                <a href="#">&raquo;</a>
            </li>
        </ul>
    </div>
</div>

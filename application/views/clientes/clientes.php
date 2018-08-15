<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />

<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){ ?>
<div class="span4" style="margin-left: 0">
    <a href="<?php echo base_url();?>index.php/clientes/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Cliente</a>    
</div>
<div class="span8" style="margin-left: 0">

  <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'rCliente')){ ?>

  <form action="<?php echo current_url(); ?>" method="get" >

    <div class="span8">

      <select name="canalEntrada" class="span12">
        <option value="">Todos</option>
        <option value="Base">Já sou cliente</option>
        <option value="Direto">Direto</option>
        <option value="Indicação">Indicação</option>
        <option value="Google">Google</option>
        <option value="Facebook">Facebook</option>
        <option value="Internet">Internet</option>
        <option value="Email">Email</option>
        <option value="Panfleto">Panfleto</option>
        <option value="Outros">Outros</option>
      </select>

    </div>

    <div class="span4" style="margin-right: 0">

      &nbsp

      <button type="submit" class="span12 btn btn-primary">Filtrar</button>

    </div>

    

  </form>

  <?php } ?>

</div>

<?php } ?>



<?php

if(!$results){?>



        <div class="widget-box">

        <div class="widget-title">

            <span class="icon">

                <i class="icon-user"></i>

            </span>

            <h5>Clientes</h5>



        </div>



        <div class="widget-content nopadding">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Nome</th>

                        <th>Telefone</th>

                        <th>Celular</th>
                        <th>Canal</th>

                        <th></th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td colspan="5">Nenhum Cliente Cadastrado</td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>



<?php }else{

    



?>

<div class="widget-box">

     <div class="widget-title">

        <span class="icon">

            <i class="icon-user"></i>

         </span>

        <h5>Clientes</h5>



     </div>



<div class="widget-content nopadding">





<table class="table table-bordered ">

    <thead>

        <tr>

            <th>#</th>

            <th>Nome</th>

            <th>Telefone</th>

            <th>Celular</th>
            <th>Canal</th>

            <th></th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($results as $r) {

            echo '<tr>';

            echo '<td>'.$r->idClientes.'</td>';

            echo '<td>'.$r->nomeCliente.'</td>';

            echo '<td>'.$r->telefone.'</td>';

            echo '<td>'.$r->celular.'</td>';
            echo '<td>'.$r->canalEntrada.' '.$r->canalEntradaIndicacao.'</td>';

            echo '<td>';

            if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){

                echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$r->idClientes.'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 

            }

            if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){

                echo '<a href="'.base_url().'index.php/clientes/editar/'.$r->idClientes.'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Cliente"><i class="icon-pencil icon-white"></i></a>'; 

            }

            if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){

                echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="'.$r->idClientes.'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Cliente"><i class="icon-remove icon-white"></i></a>'; 

            }



              

            echo '</td>';

            echo '</tr>';

        }?>

        <tr>

            

        </tr>

    </tbody>

</table>

</div>

</div>

<?php echo $this->pagination->create_links();}?>







 

<!-- Modal -->

<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <form action="<?php echo base_url() ?>index.php/clientes/excluir" method="post" >

  <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

    <h5 id="myModalLabel">Excluir Cliente</h5>

  </div>

  <div class="modal-body">

    <input type="hidden" id="idCliente" name="id" value="" />

    <h5 style="text-align: center">Deseja realmente excluir este cliente e os dados associados a ele (OS, Vendas, Receitas)?</h5>

  </div>

  <div class="modal-footer">

    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>

    <button class="btn btn-danger">Excluir</button>

  </div>

  </form>

</div>













<script type="text/javascript">

$(document).ready(function(){





   $(document).on('click', 'a', function(event) {

        

        var cliente = $(this).attr('cliente');

        $('#idCliente').val(cliente);



    });


$(".datepicker-eua" ).datepicker({ dateFormat: 'y-m-d' });
});



</script>


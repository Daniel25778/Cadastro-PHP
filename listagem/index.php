<?php
    require('../database/conexao.php');
    $sql = "SELECT * FROM tbl_pessoa";
    $resultado = mysqli_query($conexao, $sql);
    include('../componentes/header.php');

?>

<div class="container">

    <br/>
    
    <table class="table table-bordered">
 
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>E-mail</th>
            <th>Celular</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
                <?php
                
                    while ($pessoa = mysqli_fetch_array($resultado)) {?>

                        <tr>
                            <th><?php echo $id = $pessoa["cod_pessoa"]; ?></th>
                            <th><?php echo $nome = $pessoa["nome"]; ?></th>
                            <th><?php echo $sobrenome = $pessoa["sobrenome"];?></th>
                            <th><?php echo $email = $pessoa["email"];?></th>
                            <th><?php echo $celular = $pessoa["celular"];?></th>

                            <th>
                                <form action=""><button class="btn btn-warning">Editar</button></form>
                               

                               <form id="formDeletar" action="../cadastro/acoes.php" method="post" style="display: inline;">
                                    <input type="hidden" name="acao" value="deletar">
                                    <input type="hidden" name="cod_pessoa" id="cod_pessoa" value="<?php echo $id; ?>"> 

                               <button onclick="deletar()" class="btn btn-danger">Excluir</button>
                               </form>
                    
                            </th>
                        </tr>
                        
                <?php } ?>
            
    </tbody>

    </table>

</div>

<!-- SCRIPT QUE DISPARA O FORM DE EXCLUSÃO DE PRODUTOS -->
<script lang="javascript">
        function deletar() {
            if (confirm("Tem certeza que deseja deletar o cadastro desta pessoa?")) {
                document.querySelector("#formDeletar").submit();
            }
        }
</script>



<?php
    include('../componentes/footer.php');
?>
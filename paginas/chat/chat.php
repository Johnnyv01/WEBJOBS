<?php

include "bd.php";

$id = $_GET['id'];

            $consulta = "SELECT * FROM tb_chat WHERE id_cadastro = '$id' ORDER BY id DESC";
            $executar = $conexion-> query($consulta);
            while($linha = $executar-> fetch_array()):
            ?> 
                <div id="dados-chat">
                <span style="color: #1C62C4;"><?php echo $linha ['nome']; ?> </span> <!-- Retirar o <br> se necessário -->
                    <span style="color: #848484;"><?php echo $linha ['mensagem']; ?> </span>
                    <span style="float: right;"><?php echo formatarData ($linha ['data']); ?> </span> <br>
                </div>
             <?php endwhile; ?>
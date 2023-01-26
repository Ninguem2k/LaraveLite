                     <?php include_once "View\layouts\Heder.php" ?>

                     <head>
                         <title>Agenda</title>
                         <style>
                             input[type=submit] {

                                 background-color: #F8A428;
                                 border: none;
                                 cursor: pointer;
                                 width: 200px;
                                 height: 40px;
                                 font-family: 'Alex Brush';
                                 border-radius: 70px;

                             }
                         </style>
                     </head>

                     <div class="container-fluid" style="margin-top: 3.5rem; background-color: #212529fa;">
                         <div class="row">
                             <div class="table-responsive" style="height: 100vh; ">
                                 <table class="table table-dark table-sm">
                                     <thead>
                                         <tr>
                                             <th scope="col">ID</th>
                                             <th scope="col">Data</th>
                                             <th scope="col">Usuario</th>
                                             <th scope="col">Hora de Início</th>
                                             <th scope="col">Hora de Fim</th>
                                             <th scope="col">servico</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $id = $agendamento['id'];
                                            $data = $agendamento['data'];
                                            $hora_inicio = $agendamento['hora_inicio'];
                                            $hora_fim = $agendamento['hora_fim'];
                                            $servico = $agendamento['servico'];
                                            $username = $user['username'];
                                            echo "
                                                        <tr>
                                                            <td>$id</td>
                                                            <td>$data</td>
                                                            <td>$username</td>
                                                            <td>$hora_inicio</td>
                                                            <td>$hora_fim</td>
                                                            <td>$servico</td>
                                                        </tr>";
                                            ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                     <?php include_once "View\layouts\Footer.php" ?>
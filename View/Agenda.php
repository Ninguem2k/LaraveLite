                           <head>
                               <title>Agenda</title>
                           </head>
                           <div class="card-body" style="padding: 0;">
                               <div class="row">
                                   <div class="table-overflow">
                                       <div class="col-md-12">
                                           <table>
                                               <tr>
                                                   <th>ID</th>
                                                   <th>Data</th>
                                                   <th>Hora de Início</th>
                                                   <th>Hora de Fim</th>
                                                   <th>Descrição</th>
                                                   <th>Ações</th>
                                               </tr>
                                               <?php foreach ($agendamentos as $agendamento) {
                                                    $id = $agendamento['id'];
                                                    $data = $agendamento['data'];
                                                    $hora_inicio = $agendamento['hora_inicio'];
                                                    $hora_fim = $agendamento['hora_fim'];
                                                    $descricao = $agendamento['descricao'];

                                                    echo "
                                                        <tr>
                                                            <td>$id</td>
                                                            <td>$data</td>
                                                            <td>$hora_inicio</td>
                                                            <td>$hora_fim</td>
                                                            <td>$descricao</td>
                                                            <td>
                                                                <a href='/pedido/visualizar/$id'>Visualizar</a>
                                                                <a href='/pedido/editar/$id'>Editar</a>
                                                                <a href='/pedido/excluir/$id'>Excluir</a>
                                                            </td>
                                                        </tr>";
                                                } ?>
                                               <table>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <style type="text/css">
                               .table-overflow {
                                   width: 100%;
                                   min-height: 400px;
                                   max-height: 400px;
                                   overflow-y: auto;
                                   /*background: yellow*/
                               }

                               .dropdown-content {
                                   display: none;
                                   position: absolute;
                                   right: 0;
                                   background-color: #f9f9f9;
                                   min-width: 160px;
                                   box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                                   z-index: 10;
                               }

                               .dropdown-content a {
                                   border: 1px solid white;
                                   color: black;
                                   padding: 12px 16px;
                                   text-decoration: none;
                                   display: block;
                               }

                               .dropdown-content a:hover {
                                   color: white;
                               }

                               .dropdown:hover .dropdown-content {
                                   display: block;
                               }

                               .dropdown:hover .dropbtn {
                                   background-color: #3e8e41;
                               }
                           </style>
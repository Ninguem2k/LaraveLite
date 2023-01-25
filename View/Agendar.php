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

                           <div class="container-fluid text-center" style="margin-top: 3.5rem; background-color: #212529fa;">

                               <div class="d-flex  align-items-center justify-content-center">

                                   <form action='/pedido/agendar' method='post'>
                                       <div class=" form-group">
                                           <label>Data:</label>
                                           <input type='date' name='data' class="form-control">
                                       </div>

                                       <div class="form-group">
                                           <label>Hora de Início:</label>
                                           <input type='time' name='hora_inicio' class="form-control">
                                       </div>

                                       <div class="form-group" style="display: none;">
                                           <label>Hora de Fim:</label>
                                           <input type='time' name='hora_fim' class="form-control">
                                       </div>

                                       <div>
                                           <p class="textoservico">Selecione o Serviço:</p>
                                       </div>
                                       <select name="servico" class="servico">
                                           <option value="Corte Masculino" selected>Corte Masculino</option>
                                           <option value="Limpeza de Rosto">Limpeza de Rosto</option>
                                           <option value="Fazer a Barba">Fazer a Barba</option>
                                       </select>
                                       <div class="form-group">
                                       </div>

                                       <input type='submit' value='Agendar' class="btn btn-primary m-3">
                                   </form>
                               </div>
                           </div>
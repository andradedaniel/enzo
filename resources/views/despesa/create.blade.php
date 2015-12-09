<!-- Modal -->
<div class="modal fade" id="modalDespesaCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Cadastrar nova despesa
      </div>
      <div class="modal-body">
            <form action="{{ route('despesa.store',['xx'=>$obra->id]) }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group">
                          <label>Investidor</label>
                          <select class="form-control" name="investidor_id">
                              <option>-- Selecione --</option>
                              {{-- @foreach($tiposDespesa as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                              @endforeach --}}
                          </select>
                        </div>
                    <div class="form-group">
                      <label for="data">Data</label>
                      <input type="text" name="data" data-provide="datepicker" class="datepicker form-control">
                    </div>
                    <div class="form-group">
                      <label for="valor">Valor</label>
                      <input type="number" name="valor" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="comprovante">Comprovante de Depósito</label>
                      <input type="file" name="comprovante">
                      <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                      <label for="observacao">Observação</label>
                      <input type="text" name="observacao" class="form-control">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>

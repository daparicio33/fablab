<div class="modal fade" id="multimedia-{{$entrada->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    {!! Form::open(['route'=>['dashboard.medias.store'],'method'=>'post','enctype'=>'multipart/form-data']) !!}
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="far fa-file-video text-primary"></i> Agregar contenido Multimedia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12 col-md-8">
              <div class="form-group">
                <div class="row mb-2">
                  <div class="col-sm-12 col-md-6">
                    <label for="">Tipo</label>
                    <select class="custom-select" id="tipo{{ $entrada->id }}" name="tipo" onchange="cambiartipo({{ $entrada->id }})" >
                        <option value="imagen">Imagen</option>
                        <option value="archivo">Archivo</option>
                        <option value="video">Video</option>
                    </select>
                  </div>
                </div>
                  <label for="">Recurso</label>
                  <input type="file" name="url" id="url{{ $entrada->id }}" class="form-control" onchange="previewimage(event,'#imgpreview{{ $entrada->id }}')"  required>
                  <label for="">Descripcion</label>
                  {!! Form::hidden('proyecto_id', $proyecto->id, [null]) !!}
                  {!! Form::textarea('descripcion', null, ['class'=>'form-control','required','rows'=>3]) !!}
                  {!! Form::hidden('entrada_id', $entrada->id, [null]) !!}
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <img src="" id="imgpreview{{ $entrada->id }}" width="90%" alt="imagen no disponible">
            </div>
          </div>

            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <i class="fas fa-backward"></i> Cancelar
            </button>
            <button type="submit" class="btn btn-danger">
                <i class="far fa-save"></i> Guardar
            </button>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
<div class="modal" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog animated bounceIn">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>

            <div class="modal-body">
                <div class="forsubmit">

                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Angkat Jadi Promotor</a></li>
                            <li><a href="#tabs-2">Masukkan Peserta</a></li>
                        </ul>

                        <div id="tabs-1">
                            <form id="form-tambahpromotor" " class="form-horizontal" method="POST">
                                @csrf
                                @method("POST")
                                <div class="form-group underline-wrapper">
                                    <label id="nm_promotorlabel" for="nama_angktpromotor" class="col-md-12 control-label">Nama Peserta</label>
                                        <input type="text" id="nama_angktpromotor" name="nama_angktpromotor" class="form-control borb-1" autocomplete="off" required>
                                        <span class="input-underline"></span>                                        
                                        <span id="errorsangkatpromotor" class="" style="color: red;"></span>
                                </div>

                                <div class="modal-footer" id="modalfooter">
                                    <button type="submit" class="btn btn-primary btn-save" id="btnsubmit">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div id="tabs-2">
                            <form id="form-tambahpeserta" class="form-horizontal" method="POST">
                                @csrf
                                @method("POST")
                                <input type="hidden" id="id" name="id" autocomplete="off">
                                <div class="form-group underline-wrapper">
                                    <label id="nm_promotorlabel" for="nama_promotor" class="col-md-12 control-label">Nama Promotor</label>
                                     <div>
                                        <input type="text" id="nama_forpromotor" name="nama_promotor" class="form-control borb-1" autocomplete="off" required>
                                        <span class="input-underline"></span>
                                        <span id="errorspromotor" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="nm_pesertalabel" for="nama_peserta" class="col-md-12 control-label">Nama Peserta</label>
                                    <input type="text" id="nama_peserta" name="nama_peserta" class="form-control borb-1" autocomplete="off" required>
                                    <span class="input-underline"></span>
                                    <span class="help-block with-errors"></span>
                                </div>

                                <div class="modal-footer" id="modalfooter">
                                    <button type="submit" class="btn btn-primary btn-save" id="btnsubmit">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>    
                    </div>

                    @include('layouts.loader')                    
                
                </div> <!-- end of forsubmit -->
            </div> <!-- end of modal body -->
        </div>
    </div>
</div>




<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title" id="myModalLabel">Edit Berita</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="CRUD/proses_editberita.php" name="modal-popup" enctype="multipart/form-data" method="POST" id="form-edit">
                    <div class="form-group">
                                    <label class="col-lg-3 control-label">ID Berita</label>
                                        <div class="col-lg-5">
                                            <input style="width: 210px;"  class="form-control" type="text" name="id_berita" value="" readonly/>
                                        </div>
                                </div>
    
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Judul berita</label>
                                        <div class="col-lg-5">
                                            <input style="width: 210px;"  class="form-control" type="text" name="judul" value=""/>
                                        </div>
                                </div>
    
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Isi berita</label>
                                        <div class="col-lg-5">
                                            <textarea style="width: 210px;"  class="form-control" type="text" name="isi" value=""> </textarea>
                                        </div>
                                </div>
    
    
                                <div class="form-group">
                                    <label for="">Tanggal Terbit</label>
                                  <input type="text" class="form-control" name="tanggal" style="width: 210px;" id="tanggal" placeholder="Tanggal terbit" value="">
                                </div>
    
                                <div class="form-group">
                                <input type="file" name="foto">
                                </div>
    
    
    
                                <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-success">Selesai</button>
                                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                                </div>
                </form>
            </div>
        </div>
    </div>
    
<div id="createPartner" class="modal fade animate" tabindex="-1" role="dialog" aria-labelledby="createPartnerTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPartnerTitle">{{__('admin.Add Partner')}}</h5>
                <button data-pc-modal-dismiss="#createPartner" class="text-lg flex items-center justify-center rounded w-7 h-7 text-secondary-500 hover:bg-danger-500/10 hover:text-danger-500">
                    <i class="ti ti-x"></i>
                </button>
            </div>
            <form action="{{route('admin.partner.store')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">{{__('admin.Link')}}</label>
                        <input type="url" class="form-control" name="link" placeholder="Link">
                    </div>
                    <div class="form-group">
                        <label for="imageFile" class="form-label d-block">{{__('admin.Image')}}</label>
                        <label class="btn btn-outline-secondary" for="imageFile">
                            <i class="ti ti-upload me-2"></i>
                            {{__("Choose Image")}}
                            <i  id="doneChooseMedia" class="ti ti-check bg-success text-white rounded-circle p-1 " style="transition: all 0.3s ease; opacity: 0"></i>
                        </label>
                        <button type="button" id="imageFile" class="d-none" data-pc-toggle="modal" data-pc-target="#mediaModal"></button>
                        <input type="text" class="form-control mt-2 d-none" id="imagePathInput" value="" name="imagePath" accept="image/*" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-pc-modal-dismiss="#createPartner">{{__('admin.Close')}}</button>
                    <button type="submit" class="btn btn-primary ml-2">ٍ{{__('admin.Add')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

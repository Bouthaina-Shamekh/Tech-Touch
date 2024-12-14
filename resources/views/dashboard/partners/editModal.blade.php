<div id="editPartner-{{$partner->id}}" class="modal fade animate" tabindex="-1" role="dialog" aria-labelledby="editPartnerTitle-{{$partner->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPartnerTitle-{{$partner->id}}">{{__('admin.Edit Partner')}}</h5>
                <button data-pc-modal-dismiss="#editPartner-{{$partner->id}}" class="text-lg flex items-center justify-center rounded w-7 h-7 text-secondary-500 hover:bg-danger-500/10 hover:text-danger-500">
                    <i class="ti ti-x"></i>
                </button>
            </div>
            <form action="{{route('admin.partner.update', $partner->id)}}" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label class="form-label">{{__('admin.Link')}}</label>
                        <input type="url" class="form-control" name="link" placeholder="Link" value="{{$partner->link}}">
                    </div>
                    <div class="form-group">
                        <label for="imageFile" class="form-label d-block">{{__('admin.Image')}}</label>
                        <label class="btn btn-outline-secondary" for="imageFile">
                            <i class="ti ti-upload me-2"></i>
                            {{__("Choose Image")}}
                            <i  id="doneChooseMediaEdit-{{$partner->id}}" class="ti ti-check bg-success text-white rounded-circle p-1 " style="transition: all 0.3s ease; opacity: 0"></i>
                        </label>
                        <button type="button" id="imageFile" class="d-none" data-pc-toggle="modal" data-pc-target="#mediaModal"></button>
                        <input type="text" class="form-control mt-2 d-none" id="imagePathInputEdit-{{$partner->id}}" value="" name="imagePath" accept="image/*" readonly>
                        <img src="{{asset('storage/' . $partner->image)}}" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-pc-modal-dismiss="#editPartner-{{$partner->id}}">{{__('admin.Close')}}</button>
                    <button type="submit" class="btn btn-primary ml-2">ٍ{{__('admin.Edit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

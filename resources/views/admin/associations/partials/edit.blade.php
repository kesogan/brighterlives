<div class="modal fade edit-layout-modal" id="editAssociationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1"><i class="fas fa-pencil-alt"></i> {{ __('Update Association') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form  method="POST" action="{{route('admin.association.update')}}" enctype="multipart/form-data">
                    @include('admin.associations.partials._form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('Close') }}</button>
                <button id="depart-form-submit-btn" type="submit" class="btn btn-secondary" ><i class="fas fa-pencil-alt"></i> {{ __('Update') }}</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade edit-layout-modal" id="createAssociationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" ><i class="fas fa-plus"></i> {{__('Create New Association')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <!-- class="dropzone" -->
                <form  method="POST" action="{{route('admin.association.store')}}" enctype="multipart/form-data">
                    @include('admin.associations.partials._form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">{{__('Close')}}</button>
                <button  type="submit" class="btn btn-secondary" ><i class="fas fa-plus"></i> {{__('Create')}}</button>
            </form>
            </div>
        </div>
    </div>
</div>

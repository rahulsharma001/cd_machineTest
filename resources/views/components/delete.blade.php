@props(['classSc','classUc'])
<div class="modal fade" id="delete{{$classUc}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$classUc}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DELETE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>

            <div class="modal-body">
                <form class="needs-validation" id="{{$classSc}}-delete-form" method="POST">
                    @method('DELETE')
                    @csrf
                </form>
                Do you want to delete this?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                <a href="javascript:void(0)" id="{{$classSc}}-delete-submit" class="btn btn-primary">YES</a> </div>
        </div>
    </div>
</div>
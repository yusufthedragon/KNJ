@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Donasi
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('donasi.show_fields')
                    <div class="col-md-6">
                        <a href="{!! route('donasi.index') !!}" class="btn btn-default">Back</a>
                    </div>
                    <div class="col-md-6" align="right">
                        <form id="form-approve" action="{{ route('approving_donasi', $donasi->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="status" id="status">
                            <button type="button" class="btn btn-primary" onclick="approve()">Setuju</button>
                            <button type="button" class="btn btn-danger" onclick="reject()">Tolak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function approve() {
        if (confirm('Anda Yakin?')) {
            $("#status").val('1');
            $("#form-approve").submit();
        } else {
            return false;
        }
    }

    function reject() {
        if (confirm('Anda Yakin?')) {
            $("#status").val('-1');
            $("#form-approve").submit();
        } else {
            return false;
        }
    }
</script>
@endsection

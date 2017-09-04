@extends("partials.layout")
@section("content")	

<div id="wrapper">
<div id="content">
            <div class="normalheader transition animated fadeIn">
                <div class="hpanel">
                    <div class="panel-body" style="padding: 10px 17px">
		<form action="{{URL::to('/admin/update-zone/')}}" class="form-horizontal" method="post">
		
		<div class="container" style="margin-top: 30px;">
			<div class="row">
				
				<div class="col-sm-5 border border-primary pre-scrollable">
					<input type="hidden" name="check" value="0" />
					@foreach($st as $zona)
						<input type="checkbox" value="{{ $zona->COD_POSTAL }}" name="coduri[]" />
						{{$zona->STRADA}}
						<br>
					@endforeach
				</div>
				
				<div class="col-sm-2 text-center">
					<a class="btn btn-primary">>></a><br>
					<button class="btn btn-primary"  type="submit" style="padding-left: 17.25px; padding-right: 17.25px;">></button><br>
				{{ csrf_field()}}

		</form>

		<form action="{{URL::to('/admin/update-zone/')}}" class="form-horizontal" method="post">

					<button class="btn btn-primary"  type="submit" style="padding-left: 17.25px; padding-right: 17.25px;"><</button><br>
					<a class="btn btn-primary"><<</a><br>
				</div>
				
				<div class="col-sm-5 border border-primary pre-scrollable">
					<input type="hidden" name="check" value="1" />
					@foreach($dr as $localitate)
						<input type="checkbox" value="{{ $localitate->COD_POSTAL }}" name="coduri[]" />
						{{$localitate->STRADA}}
						<br>
					@endforeach
				</div>

				{{ csrf_field()}}

			
				
			</div>
		</div>

		</form>

		<br>

		<div class="container">
			<div class="row">
				<div class="col-md-4">
				</div>
					
					<div class="col-md-4">
					<form action="/insert" method="POST">
						{{ csrf_field() }}
						<label>Cod Postal</label>
    					<input type="text" name="codPostal"><br>
    					<label>Strada</label>
    					<input type="text" name="strada"><br>
    					<label>Localitate</label>
    					<input type="text" name="localitate"><br>
    					<label>Zona</label>
    					<input type="text" name="zona"><br>
    					<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					</div>
				
				<div class="col-md-4">
				</div>
			</div>
		</div>
		</div>
	</div>
	</div>
	</div>
	</div>

@endsection


<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
	{{ __('Add ') }}
    </h2>
</x-slot>

<div class="py-12 " >
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
	<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

	    <form method="POST" action="/timelogs">
		<div class="form-group">
		    <input name="sdateandtime" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" id="datetimepicker" placeholder='Enter the starting date & time'></> <br><br>
		    @if ($errors->has('sdateandtime'))
			<span class="text-danger">{{ $errors->first('sdateandtime') }}</span>
		    @endif
		</div>

		<div class="form-group">
		    <input name="edateandtime" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" id="datetimepicker1" placeholder='Enter the ending date & time'></input> <br><br> 
		    @if ($errors->has('edateandtime'))
			<span class="text-danger">{{ $errors->first('edateandtime') }}</span>
		    @endif
		</div>

		<div class="form-group">
		    <input name="hours" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" id="hours" placeholder="Calculate the hours - press the calculate to do it automatically."></input>

<button class="h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800" type="button" value="click" OnClick="cal();">Calculate</button>
		    @if ($errors->has('hours'))
			<span class="text-danger">{{ $errors->first('hours') }}</span>
		    @endif
		</div>

		<div class="form-group">
<button type="submit" class="w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Add</button> 
		</div>
		{{ csrf_field() }}
	    </form>
	</div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
$("#datetimepicker").datetimepicker();
$("#datetimepicker1").datetimepicker();
function cal() {
    var start_date = $("#datetimepicker").val();
    var end_date = $("#datetimepicker1").val();

    start_date = new Date(start_date);
    end_date = new Date(end_date);
    var diff = end_date - start_date;

    var diffSeconds = diff/1000;
    var HH = Math.floor(diffSeconds/3600);
    var MM = Math.floor(diffSeconds%3600)/60;

    var formatted = ((HH < 10)?("0" + HH):HH) + ":" + ((MM < 10)?("0" + MM):MM)
    $("#hours").val(formatted);
}

</script> 
@endpush
</x-app-layout>

<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Task') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        
            <form method="POST" action="/timelogs">

                <div class="form-group">
                    <textarea name="dayName" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter the name of the day'></textarea>  
                    @if ($errors->has('dayName'))
                        <span class="text-danger">{{ $errors->first('dayName') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <textarea name="from" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter the starting time'></textarea>  
                    @if ($errors->has('from'))
                        <span class="text-danger">{{ $errors->first('from') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <textarea name="to" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter the ending time'></textarea>  
                    @if ($errors->has('to'))
                        <span class="text-danger">{{ $errors->first('to') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add </button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portfolios') }}
            <span><a href="{{ url('portfolio/create') }}"><button class="float-right text-blue-800">Add</button></a></span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- component -->
                <table class="border-collapse w-full">
                    <thead>
                    <tr>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Sl</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Title</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Clint</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Start date</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Project image</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php( $i = 1)
                    @foreach($portfolios as $portfolio)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                {{ $i++ }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 border border-b block lg:table-cell relative lg:static">
                                {{ $portfolio->title }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 border border-b block lg:table-cell relative lg:static">
                                {{ $portfolio->client_name }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 border border-b block lg:table-cell relative lg:static">
                                {{ $portfolio->start_date }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 border border-b block lg:table-cell relative lg:static">
                                <img src="{{ asset($portfolio->project_image1) }}" alt="" width="60px">
                            </td>


                            <td class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                <a href="{{ url('portfolio/'.$portfolio->id.'/edit') }}" class="text-blue-400 hover:text-blue-600 underline pl-6">Edit</a>
                                <form action="{{ url('portfolio/'.$portfolio->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"  class="text-red-400 hover:text-blue-600 underline pl-6">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

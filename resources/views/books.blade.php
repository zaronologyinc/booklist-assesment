@extends('layout')
@section('header', 'Book List')
@section('content')
<section>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publish Date</th>
                    <th>Description</th>
                    <th>Genre</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{$book->title}}</td>
                    <td class='flex items-center content-center'>{{$book->author->name}}&nbsp;<span data-modal-title='{{$book->author->name}} Bio' data-modal-content='{{$book->author->biography}}' class='open-modal cursor-pointer'><svg aria-hidden="true" focusable="false" data-prefix="fas"
                              data-icon="paperclip" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-paperclip w-4 h-4">
                                <path fill="currentColor"
                                  d="M43.246 466.142c-58.43-60.289-57.341-157.511 1.386-217.581L254.392 34c44.316-45.332 116.351-45.336 160.671 0 43.89 44.894 43.943 117.329 0 162.276L232.214 383.128c-29.855 30.537-78.633 30.111-107.982-.998-28.275-29.97-27.368-77.473 1.452-106.953l143.743-146.835c6.182-6.314 16.312-6.422 22.626-.241l22.861 22.379c6.315 6.182 6.422 16.312.241 22.626L171.427 319.927c-4.932 5.045-5.236 13.428-.648 18.292 4.372 4.634 11.245 4.711 15.688.165l182.849-186.851c19.613-20.062 19.613-52.725-.011-72.798-19.189-19.627-49.957-19.637-69.154 0L90.39 293.295c-34.763 35.56-35.299 93.12-1.191 128.313 34.01 35.093 88.985 35.137 123.058.286l172.06-175.999c6.177-6.319 16.307-6.433 22.626-.256l22.877 22.364c6.319 6.177 6.434 16.307.256 22.626l-172.06 175.998c-59.576 60.938-155.943 60.216-214.77-.485z"
                                  class=""></path>
                            </svg></span></span></td>
                    <td>{{$book->publish_date->format('m/d/Y')}}</td>
                    <td><button class='cursor-pointer open-modal' data-modal-title='{{$book->title}} Description' data-modal-content='{{$book->description}}'>View</button></td>
                    <td>{{$book->genre->title}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$books->links()}}
</section>
<div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50"><svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg><span class="text-sm">(Esc)</span></div>
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold modal__title"></p>
                <div class="modal-close cursor-pointer z-50"><svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg></div>
            </div>
            <!--Body-->
            <p class='model-content__inner'></p>

            <!--Footer-->
            <div class="flex justify-end pt-2">
                <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
            </div>

        </div>

    </div>

</div>


@endsection

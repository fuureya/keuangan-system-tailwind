@extends('livewire.dashboard.partials.core')
@section('content')
    @if (request()->session()->has('hapus'))
        <div class="container error error-click mt-5" id="alertbox">
            <div class="container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
                role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                </svg>
                <p>Berhasil Menghapus Data</p>

                <button class="absolute top-0 bottom-0 right-0 px-4 py-3 ">
                    <svg class="fill-current h-6 w-6 text-white closealertbutton" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </button>
            </div>
        </div>
    @endif



    <div class="container">
        <div class="mt-14 px-5">
            <nav class="block w-full max-w-full bg-transparent text-white shadow-none rounded-xl transition-all px-0 py-1">
                <div class="flex flex-col-reverse justify-between gap-6 md:flex-row md:items-center">
                    <div class="capitalize">
                        <nav aria-label="breadcrumb" class="w-max">
                            <ol
                                class="flex flex-wrap items-center w-full bg-opacity-60 rounded-md bg-transparent p-0 transition-all">
                                <li
                                    class="flex items-center text-blue-gray-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-light-blue-500">
                                    <a href="#">
                                        <p
                                            class="block antialiased font-sans text-sm leading-normal text-blue-900 font-normal opacity-50 transition-all hover:text-blue-500 hover:opacity-100">
                                            dashboard</p>
                                    </a>
                                    <span
                                        class="text-gray-500 text-sm antialiased font-sans font-normal leading-normal mx-2 pointer-events-none select-none">/</span>
                                </li>
                                <li
                                    class="flex items-center text-blue-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-blue-500">
                                    <p
                                        class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                                        Data Siswa</p>
                                </li>
                            </ol>
                        </nav>
                        <h6
                            class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-gray-900">
                            Data Siswa</h6>
                    </div>

                </div>
            </nav>
        </div>
    </div>

    {{-- dashboard table view --}}
    <div class="container mt-9 display-table">
        <div class="px-6 grid grid-cols-10">
            {{-- pencarian jika admin --}}
            @can('isAdmin')
                <div class="buton-wrap col-span-5 pt-2">
                    <button
                        class="middle none center flex items-center justify-center rounded-lg p-4 font-sans text-xs font-bold uppercase bg-gray-200 text-gray-900 transition-all hover:bg-gray-50/50 active:bg-gray-500 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        data-ripple-dark="true" id="tombol-add">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>

                <div class="search-wrap col-span-5 flex justify-end">
                    <div>
                        <div class="pt-2 relative mx-auto text-gray-900">
                            <input
                                class="border-2 border-gray-900 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                type="search" wire:model.live="search" placeholder="Search" autocomplete="off" id="pencarian">
                            <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                <svg class="text-gray-900 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                    xml:space="preserve" width="512px" height="512px">
                                    <path
                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>

                            </button>
                        </div>
                    </div>

                </div>
            @endcan

            {{-- pencarian jika guru --}}
            @can('isGuru')
                <div class="search-wrap col-span-10 flex justify-end">
                    <div>
                        <div class="pt-2 relative mx-auto text-gray-900">
                            <input
                                class="border-2 border-gray-900 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                type="search" name="search" placeholder="Search" autocomplete="off" id="pencarian-guru">
                            <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                <svg class="text-gray-900 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                    xml:space="preserve" width="512px" height="512px">
                                    <path
                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>

                            </button>
                        </div>
                    </div>

                </div>
            @endcan
        </div>


        {{-- table section --}}
        <div class="container">
            {{-- on card table section --}}
            <div class="table-section">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto overflow-y-scroll h-screen">
                            {{-- loading section --}}
                            <div class="h-full bg-white loading">
                                <div class="flex justify-center items-center h-full">
                                    <img class="h-16 w-16"
                                        src="https://icons8.com/preloaders/preloaders/1488/Iphone-spinner-2.gif"
                                        alt="">
                                </div>
                            </div>
                            {{-- end loading section --}}
                            <table class="w-full table">
                                <thead>
                                    <tr
                                        class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                        <th class="px-4 py-3">Nama</th>
                                        <th class="px-4 py-3">Kelas</th>
                                        <th class="px-4 py-3">NISN</th>
                                        <th class="px-4 py-3">Jurusan</th>
                                        <th class="px-4 py-3">Kategory</th>
                                        <th class="px-4 py-3">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white" id="tbody">
                                    @foreach ($data as $item)
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-3 border">
                                                <div class="flex items-center text-sm">
                                                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="{{ asset('siswa/' . $item->gambar) }}" alt=""
                                                            loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true"></div>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-black">{{ $item->nama_siswa }}</p>
                                                        <p class="text-xs text-gray-600">{{ $item->nis }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-ms font-semibold border">{{ $item->kelas }}</td>
                                            <td class="px-4 py-3 text-ms font-semibold border">{{ $item->nisn }}</td>
                                            <td class="px-4 py-3 text-xs border">
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                                                    {{ $item->Category->nama_jurusan }} </span>
                                            </td>
                                            <td class="px-4 py-3 text-sm border">{{ $item->Type->type_name }}</td>
                                            <td class="px-4 py-3 text-sm border">
                                                <div class="flex justify-center">
                                                    <a href="{{ url('/data-siswa' . '/profile' . '/' . $item->nis) }}"><i
                                                            class="fa-solid fa-circle-info ml-1 mr-1 text-blue-500 hover:text-blue-900"></i></a>
                                                    @can('isAdmin')
                                                        <button wire:click="delete({{ $item->nis }})"
                                                            wire:confirm="Yakin Ingin Menghapus?" type="submit"><i
                                                                class="fa-solid fa-trash ml-1 mr-1 text-red-500 hover:text-red-900"></i></button>

                                                        <button wire:click="edit({{ $item->nis }})"
                                                            class="btn-update tombol-edit"><i
                                                                class="fa-solid
                                                    fa-pen ml-1 text-green-500 hover:text-green-900"></i></button>
                                                    @endcan

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                            @if (is_null($this->search))
                                <div class="flex justify-center">
                                    {{ $data->links() }}
                                </div>
                            @endif


                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    {{-- end dashboard table view --}}

    {{-- add data modal --}}
    <div class="container display-add bg-white shadow-xl p-9 absolute top-10 w-3/4 h-100 hidden" wire:ignore.self>
        <form method="POST" id="form-add" wire:submit="save">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Tambah Data data-siswa</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Tambahkan data siswa jika sudah fix menjadi siswa</p>
                    {{-- alert section --}}
                    <div class="error-page">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        {{ $error }}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    {{-- end alert section --}}
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="gambar" class="gambar block text-sm font-medium leading-6 text-gray-900">Foto
                                Siswa </label>
                            <div class="mt-1">
                                <input type="file" name="gambar" wire:model="gambar" id="gambar"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-0  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="nama-siswa" class="block text-sm font-medium leading-6 text-gray-900">Nama
                                Siswa </label>
                            <div class="mt-1">
                                <input type="text" name="nama_siswa" wire:model="namaSiswa" id="nama_siswa"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="nis" class="block text-sm font-medium leading-6 text-gray-900">NIS </label>
                            <div class="mt-1">
                                <input type="number" name="nis" wire:model="nis" id="nis" autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="nis" class="block text-sm font-medium leading-6 text-gray-900">NISN </label>
                            <div class="mt-1">
                                <input type="number" name="nisn" id="nisn" wire:model="nisn"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label for="jurusan" class="block text-sm font-medium leading-6 text-gray-900">Kelas</label>
                            <div class="mt-2">
                                <select id="kelas" wire:model="kelas" name="kelas" autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option>Pilih Kelas</option>

                                    <option value="VII A">VII A</option>
                                    <option value="VII B">VII B</option>
                                    <option value="VIII A">VIII A</option>
                                    <option value="VIII B">VIII B</option>
                                    <option value="IX A">IX A</option>
                                    <option value="IX B">IX B</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="jurusan"
                                class="block text-sm font-medium leading-6 text-gray-900">Jurusan</label>
                            <div class="mt-2">
                                <select id="category_id" wire:model="category" name="category_id" autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option>Pilih Jurusan</option>
                                    @foreach ($jurusan as $datas)
                                        <option value="{{ $datas->id }}">{{ $datas->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Kelas
                                Siswa</label>
                            <div class="mt-2">
                                <select id="type_id" wire:model="type" name="type_id" autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option>Pilih Kelas Siswa</option>
                                    @foreach ($kelasSiswa as $datas)
                                        <option value="{{ $datas->id }}">{{ $datas->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="absolute -translate-y-1/2 -translate-x-1/2 top-2/4 left-1/2" wire:loading>
                <div
                    class="flex items-center justify-center w-56 h-56 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <div role="status">
                        <svg aria-hidden="true"
                            class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" id="button-cancel"
                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button wire:loading.attr="disabled" type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    id="btn-add">Submit
                </button>
            </div>
        </form>
    </div>
    {{-- end add data --}}

    {{-- edit data modal --}}
    <div class="container display-edit bg-white shadow-xl p-9 absolute top-10 w-3/4 h-100 hidden" wire:ignore.self>
        <form method="POST" id="form-add" wire:submit="update">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Data data-siswa</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Edit data siswa jika sudah fix menjadi siswa</p>
                    {{-- alert section --}}
                    <div class="error-page">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        {{ $error }}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    {{-- end alert section --}}
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="gambar" class="gambar block text-sm font-medium leading-6 text-gray-900">Foto
                                Siswa </label>
                            <div class="mt-1">
                                <input type="file" name="gambar" wire:model="gambar" id="gambar"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-0  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="nama-siswa" class="block text-sm font-medium leading-6 text-gray-900">Nama
                                Siswa </label>
                            <div class="mt-1">
                                <input type="text" name="nama_siswa" wire:model="namaSiswa" id="nama_siswa"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="nis" class="block text-sm font-medium leading-6 text-gray-900">NIS </label>
                            <div class="mt-1">
                                <input type="number" name="nis" wire:model="nis" id="nis" autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="nis" class="block text-sm font-medium leading-6 text-gray-900">NISN </label>
                            <div class="mt-1">
                                <input type="number" name="nisn" id="nisn" wire:model="nisn"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label for="jurusan" class="block text-sm font-medium leading-6 text-gray-900">Kelas</label>
                            <div class="mt-2">
                                <select id="kelas" wire:model="kelas" name="kelas" autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option>Pilih Kelas</option>

                                    <option value="VII A">VII A</option>
                                    <option value="VII B">VII B</option>
                                    <option value="VIII A">VIII A</option>
                                    <option value="VIII B">VIII B</option>
                                    <option value="IX A">IX A</option>
                                    <option value="IX B">IX B</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="jurusan"
                                class="block text-sm font-medium leading-6 text-gray-900">Jurusan</label>
                            <div class="mt-2">
                                <select id="category_id" wire:model="category" name="category_id" autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option>Pilih Jurusan</option>
                                    @foreach ($jurusan as $datas)
                                        <option value="{{ $datas->id }}">{{ $datas->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Kelas
                                Siswa</label>
                            <div class="mt-2">
                                <select id="type_id" wire:model="type" name="type_id" autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option>Pilih Kelas Siswa</option>
                                    @foreach ($kelasSiswa as $datas)
                                        <option value="{{ $datas->id }}">{{ $datas->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="absolute -translate-y-1/2 -translate-x-1/2 top-2/4 left-1/2" wire:loading>
                <div
                    class="flex items-center justify-center w-56 h-56 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <div role="status">
                        <svg aria-hidden="true"
                            class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" id="button-cancel-edit"
                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button wire:loading.attr="disabled" type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    id="btn-add">Submit
                </button>
            </div>
        </form>
    </div>
    {{-- end edit data --}}

    @script
        <script>
            $(document).ready(function() {
                Livewire.on('formSubmitted', () => {
                    $('.display-add').hide();
                });
                Livewire.on('formEditSubmitted', () => {
                    $('.display-edit').hide();
                });
            })
        </script>
    @endscript
@endsection

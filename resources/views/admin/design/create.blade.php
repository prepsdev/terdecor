@extends('app')

@push('page-title')
    Tambah Design
@endpush

@push('page-styles')
    <style>
        .select2-container .select2-selection--multiple {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            height: auto;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .select2-container .select2-search--inline {
            display: inline-flex;
            align-items: center;
            flex: 1;
            margin: 0;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #86b7fe !important;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .select2-container .select2-selection--multiple:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .select2-selection__choice {
            background-color: #ffc20a !important;
            color: #000 !important;
            border: 0px !important;
            border-radius: 0.2rem;
            margin: 2px 4px !important;
            display: inline-flex;
            align-items: center;
            font-size: 0.875em;
            padding-top: 3px !important;
            padding-right: 3px !important;
            padding-bottom: 3px !important;
        }

        .select2-selection__choice__remove {
            color: #000 !important;
            border-right: 0px !important;
            padding: 3px 5px 3px 5px !important;
            cursor: pointer;
            margin-right: 5px;
        }

        .select2-selection__choice__remove:hover {
            background-color: rgba(255, 255, 255, 0.3) !important;
            transition: all 0.2s ease-in-out;
        }

        .select2-container--bootstrap-5 .select2-dropdown {
            border: 1px solid #ced4da !important;
            border-radius: 0.375rem !important;
        }

        .select2-container--bootstrap-5 .select2-results__option--highlighted {
            background-color: #ffc20a !important;
            color: #000 !important;
        }
    </style>
@endpush

@section('content')
    <header class="page-header page-header-dark  pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="mb-0">Tambah Design</h1>
                        <div class="small text-dark mt-2">
                            <a href="{{ route('admin.dashboard') }}" class="fw-500 text-dark"><i data-feather="home"></i>
                                Beranda </a>
                            /
                            <a href="{{ route('admin.design.index') }}" class="fw-500 text-dark"> Design </a>
                            / Tambah
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a href="{{ route('admin.design.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <!-- Style Reference-->
        <form class="row" id="blog" action="{{ route('admin.design.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="col-lg-9">
                <div id="default">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <label for="title" class="form-label">Judul Design<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-sm-8 mb-3">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="Judul Design" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="description" class="form-label">Deskripsi<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-sm-8 mb-3">
                                    <textarea class="form-control" id="description" name="description" placeholder="Deskripsi singkat" rows="5"
                                        required></textarea>
                                </div>
                                <div id="imageUploadContainer">
                                    <div class="row align-items-center mb-3" id="imageUploadRow-1">
                                        <div class="col-sm-4">
                                            <label for="image-1" class="form-label">Gambar 1<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="position-relative">
                                                <input class="form-control @error('image') is-invalid @enderror"
                                                    type="file" id="image-1" name="images[]" accept="image/*" required>
                                                <button type="button"
                                                    class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-image-btn"
                                                    style="display: none;" onclick="removeImageRow('imageUploadRow-1')">
                                                    &times;
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="videoUploadContainer"></div>
                                <div class="mb-3 text-end">
                                    <button type="button" class="btn btn-primary btn-sm" id="addImageButton">Tambah
                                        Gambar</button>
                                    <button type="button" class="btn btn-success btn-sm" id="addVideoButton">Tambah
                                        Video</button>
                                </div>

                                <div class="form-text mb-3 text-end">Direkomendasikan menggunakan gambar berukuran
                                    1920x1080.</div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Konten Design<span
                                        class="text-danger">*</span></label>
                                <input name="content" type="hidden">
                                <div id="toolbar-container">
                                    <span class="ql-formats">
                                        <select class="ql-font"></select>
                                        <select class="ql-size"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-strike"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <select class="ql-color"></select>
                                        <select class="ql-background"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-script" value="sub"></button>
                                        <button class="ql-script" value="super"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-header" value="1"></button>
                                        <button class="ql-header" value="2"></button>
                                        <button class="ql-blockquote"></button>
                                        <button class="ql-code-block"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                        <button class="ql-indent" value="-1"></button>
                                        <button class="ql-indent" value="+1"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-direction" value="rtl"></button>
                                        <select class="ql-align"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-link"></button>
                                        <button class="ql-image"></button>
                                        <button class="ql-video"></button>
                                        <button class="ql-formula"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-clean"></button>
                                    </span>
                                </div>
                                <div id="editor" style="min-height: 100px;">
                                </div>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sticky Nav-->
            <div class="col-lg-3">
                <div class="nav-sticky">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12">
                                <label for="price" class="form-label">Harga Mulai dari <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" placeholder="Rp. xxx.xxx" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="price" class="form-label">Material<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <input type="text" class="form-control @error('material') is-invalid @enderror"
                                    id="material" name="material" placeholder="Material Pembuatan" required>
                                @error('material')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="price" class="form-label">Type Decoration<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <input type="text" class="form-control @error('type') is-invalid @enderror"
                                    id="type" name="type" placeholder="Type Decoration" required>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tags" class="form-label">Tagar<span class="text-danger">*</span></label>
                                <select class="form-control @error('tags') is-invalid @enderror" id="tags"
                                    name="tags[]" multiple="multiple" required></select>
                                @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('page-styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        const quill = new Quill('#editor', {
            modules: {
                syntax: true,
                toolbar: '#toolbar-container',
            },
            placeholder: 'Ketik Sesuatu',
            theme: 'snow',
            height: 500,
        });

        var form = document.querySelector('#blog');
        form.onsubmit = function() {
            var content = document.querySelector('input[name=content]');
            content.value = quill.root.innerHTML;
        };

        document.getElementById('status-switch').addEventListener('change', function() {
            const statusLabel = document.getElementById('status-label');
            statusLabel.textContent = this.checked ? 'Publikasikan' : 'Draft';
        });
    </script>
    <script>
        function formatRupiah(angka, prefix) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        document.getElementById('price').addEventListener('keyup', function(e) {
            this.value = formatRupiah(this.value, 'Rp. ');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#labels').select2({
                placeholder: "Pilih Satu atau Beberapa",
                tokenSeparators: [',']
            });

            $('#tags').select2({
                placeholder: "Ketik Apa Saja",
                tags: true,
                tokenSeparators: [','],
                ajax: {
                    url: "{{ route('admin.blog.getTags') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term // Search term
                        };
                    },
                    processResults: function(data) {
                        console.log("Data returned from server:", data); // Log data for debugging
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
    <script>
        let imageCounter = 1;
        let videoCounter = 0;

        // Add Image Upload Input
        document.getElementById('addImageButton').addEventListener('click', function() {
            imageCounter++;

            const newRow = document.createElement('div');
            newRow.classList.add('row', 'align-items-center', 'mb-3');
            newRow.id = `imageUploadRow-${imageCounter}`;

            newRow.innerHTML = `
            <div class="col-sm-4">
                <label for="image-${imageCounter}" class="form-label">Gambar ${imageCounter}<span class="text-danger">*</span></label>
            </div>
            <div class="col-sm-8">
                <div class="position-relative">
                    <input 
                        class="form-control" 
                        type="file" 
                        id="image-${imageCounter}" 
                        name="images[]" 
                        accept="image/*" 
                        required
                    >
                    <button 
                        type="button" 
                        class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-image-btn" 
                        onclick="removeRow('imageUploadRow-${imageCounter}')"
                    >
                        &times;
                    </button>
                </div>
            </div>
        `;

            document.getElementById('imageUploadContainer').appendChild(newRow);
        });

        // Add Video URL Input
        document.getElementById('addVideoButton').addEventListener('click', function() {
            videoCounter++;

            const newRow = document.createElement('div');
            newRow.classList.add('row', 'align-items-center', 'mb-3');
            newRow.id = `videoUploadRow-${videoCounter}`;

            newRow.innerHTML = `
            <div class="col-sm-4">
                <label for="video-${videoCounter}" class="form-label">Video ${videoCounter} (URL)</label>
            </div>
            <div class="col-sm-8">
                <div class="position-relative">
                    <input 
                        class="form-control" 
                        type="text" 
                        id="video-${videoCounter}" 
                        name="videos[]" 
                        placeholder="Masukkan URL video"
                    >
                    <button 
                        type="button" 
                        class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-video-btn" 
                        onclick="removeRow('videoUploadRow-${videoCounter}')"
                    >
                        &times;
                    </button>
                </div>
            </div>
        `;

            document.getElementById('videoUploadContainer').appendChild(newRow);
        });

        // Remove any row (image or video)
        function removeRow(rowId) {
            const row = document.getElementById(rowId);
            if (row) {
                row.remove();
            }
        }
    </script>
@endpush

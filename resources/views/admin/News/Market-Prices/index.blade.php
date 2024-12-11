<x-app-layout>
    @section('css')
        {{-- Boostrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- Google Fonts --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <style>
            body {
                font-family: 'Poppins';
            }
        </style>
    @stop

    @section('content_header')
        <h5 class="fw-semibold text-md">Market Prices</h5>
        <hr class="mt-0">
    @stop

    @section('content')
        <div class="container">
            <!-- Button to trigger modal -->
            <div class="row mb-2">
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewsModal"><i
                            class="fa-solid fa-plus me-1"></i>Add Prices</button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel" aria-hidden="true"
                data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewsModalLabel">Create News</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="newsForm">
                                <div class="mb-3">
                                    <label for="newsTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="newsTitle" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newsContent" class="form-label">Description</label>
                                    <textarea class="form-control" id="newsContent" name="content" rows="2" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="newsDate" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="newsDate" name="date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newsDate" class="form-label">Images</label>
                                    <input type="file" class="form-control" id="newsDate" name="date" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" form="newsForm">Save News</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @stop
</x-app-layout>

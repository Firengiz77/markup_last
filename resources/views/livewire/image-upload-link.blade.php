<div>
    <div class="col-md-6">
        {{--        <div class="text-end">--}}

        {{--            <button class="btn btn-sm btn-primary btn-icon m-1 " data-repeater-create--}}
        {{--                    type="button"><i class="ti ti-plus"></i></button>--}}
        {{--        </div>--}}
        <div data-repeater-list="home_logo">
            <div data-repeater-item class="text-end">
                <div class="card mb-3 border shadow-none product_Image">
                    <div class="px-2 py-2">
                        <form wire:submit.prevent="save">

                            <div class="row align-items-center">
                                <div class="col">
                                    <input type="file" class="form-control"
                                           accept="image/*" wire:model="photo">

                                </div>
                                <div class="col-auto">
                                    <button type="submit"  class="action-item btn btn-sm btn-icon btn-light-secondary"

                                    >
                                        <i class="ti ti-upload"></i>
                                    </button>
                                </div>

                            </div>
                            <div wire:loading wire:target="photo" class="text-sm text-gray-500 italic">Uploading...
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>

        @foreach($images as $image )
            <div>
                <div class="card mb-3 border shadow-none product_Image">
                    <div class="px-2 py-2">
                        <div class="row align-items-center">
                            <div class="col-2 ml-n2">
                                <p class="card-text small text-muted">
                                    <img class="rounded" src="{{$image->image}}"
                                         width="70px" alt="Image placeholder"
                                    >
                                </p>
                            </div>
                            <div class="col-6">

                                <input type="text" id="link{{$image->id}}" class="form-control"
                                       accept="image/*" value="{{$image->image}}">
                            </div>


                            <div class="col-auto actions">
                                <a class="action-item btn btn-sm btn-icon btn-light-secondary"
                                   href="{{$image->image}}" download=""
                                   data-toggle="tooltip" data-original-title="Download">
                                    <i class="ti ti-download"></i>
                                </a>
                            </div>
                            <div class="col-auto actions">
                                <a class="action-item btn btn-sm btn-icon btn-light-secondary delete-button"
                                   wire:click.prevent="delete({{$image->id}})"
                                   data-image="#">
                                    <i class="ti ti-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

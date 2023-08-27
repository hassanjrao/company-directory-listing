<section class="event-wrap-layout1 padding-top-9p6 padding-bottom-10 bg--accent" id="recommendUs">
    <div class="container">

        <div class="row justify-content-center">

                <div class="col-lg-8">
                    <div class="contact-box">

                        <h2 class="">Did'nt find what you are looking for?</h2>
                            <p>Recommend Us!</p>

                        <form class="contact-form-box" wire:submit.prevent='submit'>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <input type="text" placeholder="Your Name *" class="form-control" required wire:model.defer='name' >
                                    <div class="help-block with-errors">
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12 form-group">
                                    <input type="email" placeholder="Your E-mail *" class="form-control" wire:model.defer='email' required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-12 form-group">
                                    <textarea placeholder="Message*" class="textarea form-control"
                                        id="form-message" rows="7" cols="20" wire:model.defer='message'
                                        required></textarea>
                                    <div class="help-block with-errors">
                                        @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12 form-group mb-0 mt-3">
                                    <button type="submit" class="item-btn" wire:loading.attr='disabled'>Submit</button>
                                </div>
                            </div>
                            <div class="form-response">
                                {{-- success message --}}
                                @if ($successMessage)
                                    <div class="alert alert-success">
                                        {{ $successMessage }}
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

        </div>

    </div>
</section>

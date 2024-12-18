    <x-layout>
      <div class="flex items-center justify-center">
      <div class="grid grid-cols-1 gap-6 justify-items-center w-auto">
        <div class="card md:card-side bg-base-100 shadow-xl max-md:flex max-md:items-center max-md:justify-center max-md:flex-col">
          <figure class="max-w-sm max-sm:rounded-none max-sm:rounded-t-2xl">
            <img
              src="{{ asset('img/testimonial.png') }}"
              alt="Dwi Agus Santoso" />
          </figure>
          <div class="card-body">
            <div class="divider divider-info">
              <h2 class="card-title sm:block hidden">Dwi Agus Santoso | Client</h2>
              <h2 class="card-title  max-sm:block hidden">Dwi A. S. | Client</h2>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste aperiam accusamus, quam enim nihil cumque possimus totam cupiditate magni modi unde, dignissimos voluptates commodi quo. Molestias unde asperiores harum illum.</p>
          </div>
        </div>

        <div class="card md:card-side bg-base-100 shadow-sm max-md:flex max-md:items-center max-md:justify-center max-md:flex-col-reverse">
          <div class="card-body">
            <div class="divider divider-info">
              <h2 class="card-title sm:block hidden">Erwan Rahmansyah | PM</h2>
              <h2 class="card-title  max-sm:block hidden">Erwan R. | PM</h2>
            </div>
            <figure >
              <img class="rounded-2xl"
                src="{{ asset('img/team/e.png') }}"
                alt="Gold" />
            </figure>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur vitae assumenda fugiat soluta adipisci, quis praesentium! Aliquid sit possimus, rem blanditiis atque tempore est, dignissimos quisquam accusantium totam voluptates hic.</p>
          </div>
          <figure class="max-w-md max-md:rounded-none max-md:rounded-t-2xl">
            <img
              src="{{ asset('img/team/erwan.png') }}"
              alt="Erwan Rahmansyah" />
          </figure>
        </div>

        <div class="card md:card-side bg-base-100 shadow-sm max-md:flex max-md:items-center max-md:justify-center max-md:flex-col">
          <figure class="max-w-md max-md:rounded-none max-md:rounded-t-2xl ">
            <img
              src="{{ asset('img/team/all.png') }}"
              alt="Muhammad Khairul Anam Al Bahri" />
          </figure>
          <div class="card-body">
            <div class="divider divider-info">
              <h2 class="card-title sm:block hidden">M. Khairul Anam Al Bahri | QA</h2>
              <h2 class="card-title max-sm:block hidden">M. K. Anam Al B. | QA</h2>
            </div>
            <figure class="">
              <img class="rounded-2xl"
                src="{{ asset('img/team/a.png') }}"
                alt="Gold" />
            </figure>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur vitae assumenda fugiat soluta adipisci, quis praesentium! Aliquid sit possimus, rem blanditiis atque tempore est, dignissimos quisquam accusantium totam voluptates hic.</p>
          </div>
        </div>

      <div class="card md:card-side bg-base-100 shadow-xl max-md:flex max-md:items-center max-md:justify-center max-md:flex-col-reverse">
        <div class="card-body">
          <div class="divider divider-info">
            <h2 class="card-title sm:block hidden">M. Abdul Rosyid | Front-End</h2>
            <h2 class="card-title max-sm:block hidden">M. A. Rosyid | F-E</h2>
          </div>
          <figure class="">
            <img class="rounded-2xl"
              src="{{ asset('img/team/r.png') }}"
              alt="silver" />
          </figure>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur vitae assumenda fugiat soluta adipisci, quis praesentium! Aliquid sit possimus, rem blanditiis atque tempore est, dignissimos quisquam accusantium totam voluptates hic.</p>
        </div>
        <figure class="max-w-md max-md:rounded-none max-md:rounded-t-2xl">
          <img
            src="{{ asset('img/team/ro.png') }}"
            alt="M. Rosyid" />
        </figure>
      </div>


    <div class="card md:card-side bg-base-100 shadow-xl max-md:flex max-md:items-center max-md:justify-center max-md:flex-col">
      <figure class="max-w-md max-md:rounded-none max-md:rounded-t-2xl">
        <img
          src="{{ asset('img/team/ha.png') }}"
          alt="M. Hafi R." />
      </figure>
      <div class="card-body">
        <div class="divider divider-info">
          <h2 class="card-title sm:block hidden">M. Hafi Raffandy | Back-End</h2>
          <h2 class="card-title max-sm:block hidden">M. Hafi R. | B-E</h2>
        </div>
        <figure >
          <img class="rounded-2xl"
            src="{{ asset('img/team/h.png') }}"
            alt="MVP" />
        </figure>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste aperiam accusamus, quam enim nihil cumque possimus totam cupiditate magni modi unde, dignissimos voluptates commodi quo. Molestias unde asperiores harum illum.</p>
      </div>
    </div>

    <div class="card md:card-side bg-base-100 shadow-xl max-md:flex max-md:items-center max-md:justify-center max-md:flex-col-reverse">
      <div class="card-body">
        <div class="divider divider-info">
          <h2 class="card-title sm:block hidden">Glen Chandra | Full-Stack</h2>
          <h2 class="card-title max-sm:block hidden">Glen Chandra | F-S</h2>
        </div>
        <figure>
          <img class="rounded-2xl"
            src="{{ asset('img/team/g.png') }}"
            alt="gold" />
        </figure>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur vitae assumenda fugiat soluta adipisci, quis praesentium! Aliquid sit possimus, rem blanditiis atque tempore est, dignissimos quisquam accusantium totam voluptates hic.</p>
      </div>
      <figure class="max-w-md max-md:rounded-none max-md:rounded-t-2xl">
        <img
          src="{{ asset('img/team/gl.png') }}"
          alt="Glen Chandra" />
      </figure>
    </div>
      </div>
      </div>
    </x-layout>

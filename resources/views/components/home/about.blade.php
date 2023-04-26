<!-- ====== About Section Start -->
<section id="about" class="dark:bg-slate-800 pt-20 lg:pt-[120px] pb-12 lg:pb-[90px] overflow-hidden">
  <div class="container">
    <div class="flex flex-wrap justify-between items-center -mx-4">
      <div class="w-full lg:w-6/12 px-4">
        <div class="flex items-center -mx-3 sm:-mx-4">
          <div class="w-full xl:w-1/2 px-3 sm:px-4">
            <div class="py-3 sm:py-4">
              <img
                src="{{ url('/img/ludovic-profile.jpg') }}"
                alt=""
                class="rounded-2xl w-full"
              />
            </div>
            <div class="py-3 sm:py-4">
              <img
                src="{{ url('/img/ludovic-profile-b.jpg') }}"
                alt=""
                class="rounded-2xl w-full"
              />
            </div>
          </div>
          <div class="w-full xl:w-1/2 px-3 sm:px-4">
            <div class="my-4 relative z-10">
              <img
                src="{{ url('/img/ludovic-profile-c.jpg') }}"
                alt=""
                class="rounded-2xl w-full"
              />
              <x-about-dots></x-about-dots>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
        <div class="mt-10 lg:mt-0">
          <span class="font-semibold text-lg text-primary mb-2 block">
             <blockquote class="text-sm text-gray-500 italic py-2 px-3 border-l-4 border-amber-500">
                 "Hard work and commitment can make anything happen"
             </blockquote>
          </span>
          <h2 class="font-bold text-3xl sm:text-4xl dark:text-gray-200 mb-8">
            About Me
          </h2>
          <p class="text-base dark:text-gray-400 mb-8">
            I am a junior full-stack developer with a keen interest in web and mobile application development.<br />
            I have experience in working with Laravel, CodeIgniter, Reactjs, Bootstrap, Tailwind, Django and Flutter. <br /><br /> I have
            developed various web applications such as school-management-software's, company-websites and event management systems using these
            technologies. I have also created mobile applications using Flutter. <br /><br />I have a good
            understanding of advanced database design and RBAC authorization and can work well with MySQL and PostgreSQL. I am always eager to learn new skills and technologies.
          </p>
          <p class="text-base dark:text-gray-400 mb-8">
            Before embarking on my Developer journey, I was a Sketch artist < Drawer >.
            I decided to merge my skills by learning Graphics design, which enables me to create amazing
            <span class="text-amber-500 font-bold">Logos, Posters, Videos</span> and <span class="text-amber-500 font-bold">Fliers</span>. <br />
            For you.<br />
          </p>
          <x-button-link href="https://youtube.com/techtz" variant="red" target="_blank">
            View my Works
          </x-button-link>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== About Section End -->

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
          Hi there, I’m Ludovick, a Software Developer who loves to create amazing web and
           mobile applications. I have two years of experience in using cutting-edge technologies such as Laravel, CodeIgniter, Reactjs, Bootstrap, Tailwind, Django and Flutter.</br>
</br>
Whether you need a school management software, a company website, or an event management system, I can build it for you with style and functionality.
</br><br>
I can also design and develop mobile applications using Flutter that will delight your users. I have a solid grasp of advanced 
database design and RBAC authorization, and I can work with MySQL and PostgreSQL seamlessly. I’m always on the lookout for new skills and technologies to learn and master.
          </p>
          <p class="text-base dark:text-gray-400 mb-8">
          But that’s not all. I’m also a former Sketch artist who can draw stunning portraits and landscapes. I decided to combine my artistic talent 
          with my technical skills by learning Graphics design. Now I can create awesome <span class="text-amber-500 font-bold">Logos, Posters, Videos and Fliers </span>for you that will make your brand stand out.
             <br />
           <br />
            I believe that the best way to learn is by building projects. 
            That’s why I’m always working on something new and exciting. If you want to see some of my work, check out my portfolio.
          </p>

          <p class="text-base dark:text-gray-400 mb-8">
          If you think I’m the right person for your project, don’t hesitate to contact me. I’d love to hear from you and discuss how we can work together. Thank you for visiting my profile. Have a great day! 😊
</p>

          <x-button-link href="https://github.com/developer006tz" variant="red" target="_blank">
            View my Works
          </x-button-link>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== About Section End -->

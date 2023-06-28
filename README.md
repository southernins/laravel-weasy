# PHP Weasyprint wrapper for Laravel
 
This package is a clone/test to see if a project using wkhtmltopdf based laravel-snappy can be ported to weasyprint.

I have been using barryvdh/laravel-snappy to generate PDF's in one of my projects for years now.  this setup has done a fabulous job, but I'm starting to have issues newer css like bootstrap 5.   Based on https://wkhtmltopdf.org/status.html it has been time to look for a new solution. After reading and researching I've worked lots of options but have been coming up short.

just recently I've come across the pontedilana/php-weasyprint project which is built as a drop in replacement for KnpLabs/snappy. Turns out installing weasyprint is just as easy as installing wkhtmltopdf was in my environment.

    apt-get install -y weasyprint
    ln -s /usr/bin/weasyprint  /usr/local/bin/weasyprint


looking at the barryvdh/laravel-snappy code base it appears to be a pretty easy port, but enough of a change that laravel-snappy won't be able to support both snappy and php-weasyprint by configuration.    so here we are just testing some things out.

The work here is basically a clone of barryvdh/laravel-snappy with changes to port over to weasyprint.  Thanks to the good work by the laravel-snappy, php-weasyprint and weasyprint projects most of what I have done here has been find and replace.

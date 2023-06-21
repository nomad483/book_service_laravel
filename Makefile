fresh:
	php artisan migrate:fresh --seed

serve:
	php artisan serve

pint:
	./vendor/bin/pint

doc.generate:
	php artisan l5-swagger:generate

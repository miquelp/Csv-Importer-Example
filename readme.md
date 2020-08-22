This Symfony 5 application is meant to be an example of usage of the CsvImporter library (https://github.com/miquelp/CsvImporter).

To know how to set up and run a Symfony application please check official documentation (https://symfony.com/doc/current/setup.html).

Files of interest:

- `migrations/Version20200822131445.php`: Migration to create `person` table that is used in this example.
- `src/Controller/Import/Import.php`: Controller that writes CSV file to database.
- `templates/import/`: In this directory you can find necessary templates to render the CSV upload form.
- `public/csv/pesons_csv_example.csv`: Sample CSV that can be used in the upload form.
- `config/services.yaml`: Services file configuration where you can find `CsvImporter` configuration.
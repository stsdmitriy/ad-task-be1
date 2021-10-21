Clone the XYZ repository and based upon that to the following task. Create a "component" in PHP language, complying with OOP patterns and clear code policy, that will be responsible for "program" export that consists of "modules". The component should allow to create a "program" out of a combination of any number of "modules", give them unique CSS class, and then allow to export it to the ifinal files. For this task create a simple "module" logic: i.e. call `console.log('onReady {cssClass}')` and `console.log('onViewable {cssClass}')` accordingly to onReady and onViewable methods, where `cssClass` property is assigned to the module itself.

Please note that component should be framework agnostic but callable from inside Laravel's artisan command.

Short dictionary:

"Program" - composition of files containing:
* HTML file with proper structure
* Javascript file with contents consisting of contained module's logic and methods `onReady()` and `onViewable()`
* CSS stylesheets

"Program" can consist of any number of "Modules" (minimum one). Each "module" is completely isolated and has no information about other modules but the "Program" is aware of all its modules.

"Module" contains own logic that should be embedded in the "program's" `onReady` and `onViewable` methods, as well as the HTML code and CSS stylesheet responsible for styling the html code.

Example of the "program" can be found in the directory "example_program".

In case of any questions, please do not hesitate and contact us directly. We will try to respond quickly to any questions. You have 24 hours to finish up the task. Good luck!

P.S.

Please upload the code to github repository with commit number greater than 3. In other words - start commiting every now and then so we could see how you worked.

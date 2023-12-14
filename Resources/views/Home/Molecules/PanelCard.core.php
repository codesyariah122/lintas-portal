 <!-- Card Panel -->
 <div class="grid grid-cols-1 lg:-mt-8 sm:-mt-4 -mt-8 top-96 z-50 shadow-lg absolute bottom-0 lg:left-36 left-1/3 lg:ml-11 ml-3 transform -translate-x-1/2">
     <div class="col-span-full">
         <div class="lg:w-screen md:w-96 w-80 max-w-sm lg:h-24 h-20 lg:p-6 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="z-index: 60;">
             <div class="flex justify-between space-x-3">
                 <div>
                     <div class="flex justify-start space-x-2">
                         <div>
                             <?php require_once "BoxIcon.core.php"; ?>
                         </div>
                         <div>
                             <div class="grid grid-cols-1">
                                 <div class="col-span-full">
                                     <span class="text-gray-600 text-xs">Saldo Inisiatif Kebaikan</span>
                                 </div>
                             </div>
                             <div class="grid grid-cols-1">
                                 <div class="col-span-full">
                                     <span class="font-semibold lg:leading-tight">Rp 0</span>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div>
                     <div class="flex justify-end mt-2">
                         <a class="bg-orange-500 border border-orange-500 text-sm px-2 py-1 rounded hover:bg-orange-600 text-white flex items-center justify-center rounded-md" href="/wallet/topup">
                             <div class="flex space-x-2">
                                 <div>
                                     <i class="fa-solid fa-plus"></i>
                                 </div>
                                 <div>
                                     <span>Isi Saldo</span>
                                 </div>
                             </div>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Card Panel -->
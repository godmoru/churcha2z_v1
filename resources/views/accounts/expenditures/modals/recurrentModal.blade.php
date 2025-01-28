<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">THis Year's Recurrent Expenditures</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <table class="table table-striped" id="filterTable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Month</th>
                  <th scope="col">Previous Balance</th>
                  <th scope="col">Current Recurrent Balance</th>
                  <th scope="col">Available Balance</th>
                  <th scope="col">Submited Expenses</th>
                  <th scope="col">Balance</th>
                </tr>
              </thead>
              <tbody id="tbody">
                @foreach($months as $key => $month)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$month}}
                    <td>{{number_format($location->getMonthPrevBal($key+1))}}</td>
                    <td>{{$location->monthlyAccRec($key+1) ? number_format($location->monthlyAccRec($key+1)->recurrent) : 0.00}}</td>
                    <td>{{number_format($location->getMonthPrevBal($key+1) + $location->getMonthRecurrent($key+1))}}</td>
                    <td>{{number_format($location->getMonthExpenses($key+1))}}</td>
                    <td>{{number_format(($location->getMonthPrevBal($key+1) + $location->getMonthRecurrent($key+1)) - $location->getMonthExpenses($key+1))}}</td>
                </tr>
                @endforeach
              </tbody>
        </table>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>
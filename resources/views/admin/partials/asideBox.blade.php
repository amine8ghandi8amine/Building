          <a href="{{ route('contact.response', -1) }}" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="{{ route('contact.box') }}"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right">{{ inboxCount() }}</span></a>
                </li>
                  
                <li><a href="{{ route('contact.sent') }}"><i class="fa fa-envelope-o"></i> Sent
                  <span class="label label-primary pull-right">{{ sentCount() }}</span></a>
                </li>

                <li><a href="{{ route('contact.draft') }}"><i class="fa fa-file-text-o"></i> Drafts
                  <span class="label label-primary pull-right">{{ draftCount() }}</span></a>
                </li>
                <li><a href="#"><i class="fa fa-filter"></i> Junk 
                  <span class="label label-primary pull-right">{{ junkCount() }}</span></a>
                </li>
                <li><a href="{{ route('contact.trash') }}"><i class="fa fa-trash-o"></i> Trash
                  <span class="label label-primary pull-right">{{ trashCount() }}</span></a>
                </li>

              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Labels</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
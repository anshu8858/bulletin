<div class="white-card">
    <h2>Article Manager</h2>
    <div class="component-action-bar">
        <?php if (count($this->model->settings->fields) > 0) { ?><a href="index.php?component=settings&controller=settings&extension=content" class="button"><i class="fa fa-cog"></i> Settings</a><?php } ?><a href="index.php?component=content&controller=article" class="button green-button"><i class="fa fa-plus"></i> New Article</a><a class="delete-by-ids button red-button"><i class="fa fa-trash"></i> Delete</a>
    </div>
    <div class="component-filters">
        <form action="index.php?component=content&controller=articles" method="get">
            <input type="hidden" name="component" value="content" />
            <input type="hidden" name="controller" value="articles" />
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="title" placeholder="Filter by title" class="form-control" value="<?php echo $_GET["title"]; ?>" />
                </div>
                <div class="col-md-1">
                    <button type="submit" class="button">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <form action="index.php?component=content&controller=articles&task=delete" method="post" class="admin-form">
        <div class="d-flex admin-header">
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-1"><strong>ID</strong></div>
            <div class="col-md-3"><strong>Title</strong></div>
            <div class="col-md-2"><strong>Category</strong></div>
            <div class="col-md-1" style="text-align: center;"><strong>Published</strong></div>
            <div class="col-md-2"><strong>Publish Date</strong></div>
            <div class="col-md-1"><strong>Author</strong></div>
            <div class="col-md-1" style="text-align: center;"><strong>Hits</strong></div>
        </div>
        <?php foreach ($this->model->articles as $article) { ?>
            <div class="d-flex admin-list align-items-center">
                <div class="col-md-1" style="text-align: center;">
                    <input type="checkbox" name="ids[]" value="<?php echo $article->id; ?>" />
                </div>
                <div class="col-md-1">
                    <?php echo $article->id; ?>
                </div>
                <div class="col-md-3">
                    <a href="index.php?component=content&controller=article&id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a>
                </div>
                <div class="col-md-2">
                    <?php echo $article->category->title; ?>
                </div>
                <div class="col-md-1" style="text-align: center;">
                    <a href="index.php?component=content&controller=article&task=<?php echo ($article->published == 1 ? "unpublish" : "publish"); ?>&id=<?php echo $article->id; ?>" class="btn btn-<?php echo ($article->published == 1 ? "success" : "danger"); ?>">
                        <i class="fa fa-<?php echo ($article->published == 1 ? "check" : "times"); ?>"></i>
                    </a>
                </div>
                <div class="col-md-2">
                    <?php echo date("jS M Y", $article->publish_time); ?>
                </div>
                <div class="col-md-1">
                    <?php echo $article->author->username; ?>
                </div>
                <div class="col-md-1" style="text-align: center;">
                    <?php echo $article->hits; ?>
                </div>
            </div>
        <?php } ?>
    </form>
</div>
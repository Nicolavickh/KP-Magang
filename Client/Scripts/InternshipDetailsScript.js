function applyTopic(topicId) {
    var conf = window.confirm("Are You Sure You Want To Apply For This Topic ?")
    if (conf) {
        window.location = "index.php?menu=applyTopic&topicId=" + topicId;
    }
}

function topicAcceptance(studentId, topicId, stageId, periodId, status) {
    if (status == 1) {
        var conf = window.confirm("Are you sure you want to accept him/her ?");
    } else {
        var conf = window.confirm("Are you sure you want to reject him/her ?");
    }
    if (conf) {
        window.location = "index.php?menu=accOrReject&studentId=" + studentId + "&topicId=" + topicId + "&stageId=" + stageId + "&periodId=" + periodId + "&status=" + status;
    }
}

function viewTopic(id) {
    window.location = "index.php?menu=viewTopic&id=" + id;
}
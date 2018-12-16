<?php
const GET = 0;
const POST = 1;

const RIGHT = 1;
const WRONG = 0;
class Question
{
    public $ask, $answer, $score, $result;

    public function __construct($_ask, $_answer, $_score)
    {
        $this->ask = $_ask;
        $this->answer = $_answer;
        $this->score = $_score;
    }

    public function get_result($ans)
    {
        $this->result = $ans == $this->answer;
        $this->answer = $ans;
    }
}

$method = $_SERVER['REQUEST_METHOD'] == 'GET' ? GET : POST;

$lazy_arr = array("帅" => RIGHT, "土豪" => RIGHT, "有技术" => RIGHT, "高富帅" => RIGHT, "白富美" => WRONG, "人生巅峰" => RIGHT, "tql" => RIGHT, "nb" => RIGHT, "qtl" => WRONG, "太厉害了吧" => RIGHT);
$questions = array();
foreach ($lazy_arr as $k => $v) {
    $questions[] = new Question("hzy" . $k, $v, 10);
}

$all_mark = 0;
if ($method == POST) {
    $buffer = "";
    $i = 1;
    foreach ($questions as &$question) {
        $question->get_result($_POST["ans" . $i]);
        $question->result AND $all_mark += $question->score;

        $buffer.="题目：".$question->ask."\r\n";
        $buffer.="回答：".($question->answer == RIGHT? "是" : "否")."\r\n";
        $buffer.="得分：".($question->result ? $question->score : 0)."\r\n";
        $i++;
    }
    file_put_contents("result.txt",$buffer);
}

?>
<?php if ($method == GET) { ?>
    <form method="POST">
        <?php $i = 1; ?>
        <?php foreach ($questions as $v) { ?>
            <div>
                <h4><?php echo $v->ask; ?></h4>
                <h6>
                    <input name="ans<?php echo $i; ?>" type="radio" id="ans<?php echo $i; ?>_Y" checked value="1"/>
                    <label for="ans<?php echo $i; ?>_Y">是</label>
                    <input name="ans<?php echo $i; ?>" type="radio" id="ans<?php echo $i; ?>_N" value="0"/>
                    <label for="ans<?php echo $i; ?>_N">否</label>
                </h6>
            </div>
            <?php $i++; ?>
        <?php } ?>
        <button type="submit">提交</button>
    </form>
<?php } else { ?>
    <?php foreach ($questions as $v) { ?>
        <div>
            <h4><?php echo $v->ask; ?></h4>
            <h6>您的回答：<?php echo $v->answer ? "是" : "否"; ?></h6>
            <h6>您<?php echo $v->result ? "答对了！加10分" : "答错了，不得分"; ?></h6>
        </div>
    <?php } ?>
    <div>
        您的总分：<?php echo $all_mark;?>，太强了吧！
    </div>
<?php } ?>


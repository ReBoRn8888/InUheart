package com.example.inuheart;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Looper;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.widget.ImageButton;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

import com.example.inuheart.util.PagerSlidingTabStrip;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import dataBaseService.DbAccessManger;

/**
 * Created by 诸建超 on 2017/3/4.
 */

public class MineActivity extends AppCompatActivity {


    private Toolbar toolbar;
    private TextView toolbar_title;
    private ImageButton back;
    private ViewPager pager;
    private PagerSlidingTabStrip tabs;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
//        this.requestWindowFeature(Window.FEATURE_NO_TITLE);
        setContentView(R.layout.appoint_result_list);

        pager = (ViewPager) findViewById(R.id.pager);
        tabs = (PagerSlidingTabStrip) findViewById(R.id.tabs);
        toolbar = (Toolbar)findViewById(R.id.toolbar);
        toolbar_title = (TextView) toolbar.findViewById(R.id.toolbar_title);
        back = (ImageButton)findViewById(R.id.back);

        toolbar_title.setText("我的预约");
        MyPagerAdapter adapter = new MyPagerAdapter(getSupportFragmentManager());
        pager.setAdapter(adapter);
        tabs.setViewPager(pager);
        setTabValue();

        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }

    public void cancel_offline(View v){
        LinearLayout layout = (LinearLayout) v.getParent();
        TextView uid = (TextView)layout.findViewById(R.id.userid);
        TextView aid = (TextView)layout.findViewById(R.id.appointid);

        final String userid = uid.getText().toString();
        final String appointid = aid.getText().toString();

        new Thread()  {
            public void run() {
                String sql = "delete from appoint_result where UserID='" + userid + "' and AppointID='" + appointid + "'";
                Log.v("id", "userid:" + userid + "  appointid:" + appointid);
                String c = DbAccessManger.getInstance().ExecNoSelectSql(sql, true);
                if (c.isEmpty()) {
                    Looper.prepare();
                    Toast.makeText(MineActivity.this, "取消成功", Toast.LENGTH_SHORT).show();
                    Looper.loop();
                } else {
                    Looper.prepare();
                    Toast.makeText(MineActivity.this, "取消失败", Toast.LENGTH_SHORT).show();
                    Looper.loop();
                }
            }
        }.start();
        finish();
    }

    public void cancel_online(View v){
//        Toast.makeText(MineActivity.this, "cancel", Toast.LENGTH_SHORT).show();
        LinearLayout layout = (LinearLayout) v.getParent();
        TextView aid = (TextView)layout.findViewById(R.id.appointid);

        final String appointid = aid.getText().toString();

//        Log.v("info","info=" + info + " appointid= " + appointid);
        new Thread()  {
            public void run() {
                String sql = "delete from online_appoint where ID='" + appointid + "'";
                Log.v("id", "appointid:" + appointid);
                String c = DbAccessManger.getInstance().ExecNoSelectSql(sql, true);
                if (c.isEmpty()) {
                    Looper.prepare();
                    Toast.makeText(MineActivity.this, "取消成功", Toast.LENGTH_SHORT).show();
                    Looper.loop();
                } else {
                    Looper.prepare();
                    Toast.makeText(MineActivity.this, "取消失败", Toast.LENGTH_SHORT).show();
                    Looper.loop();
                }
            }
        }.start();
        finish();
    }

    public class MyPagerAdapter extends FragmentPagerAdapter {
        private final String[] TITLES = { "线下预约", "线上预约"};
        List<MyFragment> fragments = new ArrayList<MyFragment>();
        public MyPagerAdapter(FragmentManager fm) {
            super(fm);
            for(String title:TITLES){
                MyFragment fragment = new MyFragment();
                Bundle args =new Bundle();
                args.putString("param", title);
                fragment.setArguments(args);
                fragments.add(fragment);
            }
        }
        @Override
        public CharSequence getPageTitle(int position) {
            return TITLES[position];
        }
        @Override
        public int getCount() {
            return TITLES.length;
        }
        @Override
        public Fragment getItem(int position) {
            return fragments.get(position);
        }
    }
    public void setTabValue(){
        tabs.setSelectedTextColor(getResources().getColor(R.color.tab_text_color_selected));
    }
}

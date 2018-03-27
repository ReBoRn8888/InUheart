package com.example.inuheart.util;

import android.app.Activity;
import android.app.Dialog;
import android.app.TimePickerDialog;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v4.app.DialogFragment;
import android.text.format.DateFormat;
import android.util.Log;
import android.widget.TimePicker;
import android.widget.Toast;

import com.example.inuheart.MyFragment;

import java.util.Calendar;

/**
 * Created by 建超 on 2017/2/28.
 */
public class TimePickerFragment extends DialogFragment implements
        TimePickerDialog.OnTimeSetListener {
    SharedPreferences mySharedPreferences;
    SharedPreferences.Editor editor;
    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        final Calendar calendar = Calendar.getInstance();
        int hour = calendar.get(Calendar.HOUR_OF_DAY);
        int minute = calendar.get(Calendar.MINUTE);

        return new TimePickerDialog(getActivity(), this, hour, minute,
                DateFormat.is24HourFormat(getActivity()));
    }

    @Override
    public void onTimeSet(TimePicker view, int hourOfDay, int minute) {
        //处理设置的时间，这里我们作为示例，在日志中输出我们选择的时间
        Log.d("onTimeSet", "hourOfDay: "+hourOfDay + "  Minute: "+minute);
        mySharedPreferences= getActivity().getSharedPreferences("test",
                Activity.MODE_PRIVATE);
        editor = mySharedPreferences.edit();
        editor.putString("hour", Integer.toString(hourOfDay));
        editor.putString("minute", Integer.toString(minute));
        editor.commit();
        Toast.makeText(getActivity(), "请按刷新图标刷新~", Toast.LENGTH_LONG).show();

    }
}
